<?php

namespace App\Http\Controllers\feature\bo\user;

use App\Http\Controllers\Controller;
use App\Repositories\AdminRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    private $menu;
    private AdminRepository $repository;

    function __construct(AdminRepository $repository)
    {
        $this->menu = "Pengguna";
        $this->repository = $repository;
    }

    function datas(Request $request)
    {
        if ($request->ajax()) {
            try {
                $data = $this->repository->getAll();
                // dd($data);
            } catch (Exception $e) {
                dd($e);
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                $btn = '<form class="d-flex justify-content-center" method="POST" action="' . route('user.destroy', encrypt($row["id"])) . '">
                                        ' . method_field("DELETE") . '
                                        ' . csrf_field() . '
                                        <a href="' . route("user.edit", encrypt($row["id"])) . '" class=" btn btn-outline-warning m-1 btn-tooltip"><i class="ti ti-edit"></i></a>
                                        <button type="button" id="deleteRow" data-message="' . $row["name"] . '" class=" btn btn-outline-danger m-1 show-alert-delete-box" data-toggle="tooltip" title="Delete"><i class="ti ti-trash"></i></button>
                                    </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["menu"] = $this->menu;
        return view('feature.bo.user.index', compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["menu"] = $this->menu;
        $data["form_status"] = "Tambah";
        return view('feature.bo.user.form', compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "id" => ["sometimes", "nullable"],
            "name" => ['required', 'string'],
            "username" => ['required', 'string'],
            // "email" => "required|email|unique:admins,email",
            // "password" => ['required', 'string'],
            "address" => ['required', 'string']
        ], [], [
            "name" => "Nama",
            "username" => "Nama pengguna",
            "email" => "Email",
            "password" => "Kata kunci",
            "address" => "Alamat"
        ]);

        isset($data["id"]) ? $data["updated_by"] = Auth::user()->id : $data["created_by"] = Auth::user()->id;

        // Simpan data menggunakan metode create() pada model Land
        try {
            $data["id"] = is_null($data["id"]) ? $data["id"] : decrypt($data['id']);
            $data["role_id"] = "2";
            $this->repository->store($data);
            return redirect()->route('user.index')->with('success', 'Berhasil menyimpan data pengguna' . $data["name"]);
        } catch (Exception $e) {
            if (env('APP_DEBUG')) {
                return $e->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat menyimpan data pengguna")->withInput($request->input);
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
        return view('feature.bo.user.form', compact("data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->repository->destroy(decrypt($id));
            return redirect()->route('user.index')->with('success', 'pengguna berhasil dihapus');
        } catch (Exception $e) {
            if (env('APP_DEBUG')) {
                return $e->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat menghapus pengguna");
        }
    }
}
