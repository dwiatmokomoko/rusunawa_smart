<?php

namespace App\Http\Controllers\feature\bo\criteria;

use App\Http\Controllers\Controller;
use App\Repositories\CriteriaRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CriteriaController extends Controller
{
    private $menu;
    private CriteriaRepository $repository;

    function __construct(CriteriaRepository $repository)
    {
        $this->menu = "Kriteria";
        $this->repository = $repository;
    }

    function datas(Request $request)
    {
        if ($request->ajax()) {
            try {
                $data = $this->repository->getAll(); // pastikan ini return Eloquent Builder/Collection
            } catch (Exception $e) {
                // sementara tampilkan pesan jelas di log, bukan dd (dd bikin 500 HTML)
                report($e);
                return response()->json(['data' => [], 'error' => 'Server error'], 500);
            }

            return DataTables::of($data)
                ->addIndexColumn()
                // kirim angka murni, tanpa '%'
                ->editColumn('weight', function ($row) {
                    return (int) $row->weight;
                })
                ->addColumn('action', function ($row) {
                    $idEnc = encrypt($row->id); // pakai object access
                    $name = e($row->name);

                    $btn = '<form class="d-flex justify-content-center" method="POST" action="' . route('criteria.destroy', $idEnc) . '">';
                    $btn .= method_field('DELETE') . csrf_field();
                    $btn .= '<a href="' . route('criteria.edit', $idEnc) . '" class="btn btn-outline-warning m-1 btn-tooltip"><i class="ti ti-edit"></i></a>';
                    $btn .= '<button type="button" id="deleteRow" data-message="' . $name . '" class="btn btn-outline-danger m-1 show-alert-delete-box" title="Delete"><i class="ti ti-trash"></i></button>';
                    $btn .= '</form>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // optional: kalau ada akses langsung non-AJAX
        abort(404);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["menu"] = $this->menu;
        return view('feature.bo.criteria.index', compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["menu"] = $this->menu;
        $data["form_status"] = "Tambah";
        return view('feature.bo.criteria.form', compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "id" => ['sometimes', 'nullable', 'string'],
            "name" => ['required', 'string', 'max:255'],
            "weight" => ['required', 'integer', 'between:0,100']
        ], [], [
            "name" => "Nama Kriteria",
            "weight" => "Bobot Kriteria"
        ]);

        isset($data["id"]) ? $data["updated_by"] = Auth::user()->id : $data["created_by"] = Auth::user()->id;
        $data["id"] = is_null($data["id"]) ? $data["id"] : decrypt($data['id']);
        try {
            $this->repository->store($data);
            return redirect()->route('criteria.index')->with('success', 'Berhasil menambah kriteria' . $data["name"]);
        } catch (Exception $e) {
            if (env('APP_DEBUG')) {
                return $e->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat menyimpan kriteria")->withInput($request->input);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data["menu"] = $this->menu;
        $data["form_status"] = "Ubah";
        $data["record"] = $this->repository->getById(decrypt($id));
        // dd($data["record"]->toArray());
        return view('feature.bo.criteria.form', compact("data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $data = $request->validate([
        //     "name" => ['required', 'string', 'max:255'],
        //     "weight" => ['required', 'integer', 'between:0,100']
        // ], [], [
        //     "name" => "Nama Kriteria",
        //     "weight" => "Bobot Kriteria"
        // ]);
        // $data["updated_by"] = Auth::user()->id;

        // // Simpan data menggunakan metode create() pada model Land
        // try {
        //     $this->repository->edit(decrypt($id), $data);
        //     return redirect()->route('criteria.index')->with('success', 'Berhasil mengubah kriteria' . $data["name"]);
        // } catch (Exception $e) {
        //     if (env('APP_DEBUG')) {
        //         return $e->getMessage();
        //     }
        //     return back()->with('error', "Oops..!! Terjadi keesalahan saat menyimpan kriteria")->withInput($request->input);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->repository->destroy(decrypt($id));
            return redirect()->route('criteria.index')->with('success', 'Kriteria berhasil dihapus');
        } catch (Exception $e) {
            if (env('APP_DEBUG')) {
                return $e->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat menghapus kriteria");
        }
    }
}
