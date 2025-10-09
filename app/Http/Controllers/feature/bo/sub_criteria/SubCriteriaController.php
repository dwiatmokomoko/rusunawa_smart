<?php

namespace App\Http\Controllers\feature\bo\sub_criteria;

use App\Http\Controllers\Controller;
use App\Repositories\CriteriaRepository;
use App\Repositories\SubCriteriaRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SubCriteriaController extends Controller
{
    private $menu;
    private SubCriteriaRepository $repository;
    private CriteriaRepository $criteria_repository;

    function __construct(SubCriteriaRepository $repository, CriteriaRepository $criteria_repository)
    {
        $this->menu = "Sub Kriteria";
        $this->repository = $repository;
        $this->criteria_repository = $criteria_repository;
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
                ->editColumn("weight", function ($row) {
                    $w = $row->weight;
                    $code = $row->criteria->id ?? null;

                    if (!$code)
                        return $w . ' %';

                    switch ($code) {
                        // case '1':
                        // case '2':
                        //     return $w == 100 ? '1' : '0';
                        case '1':
                            return $w == 100 ? '3' : ($w == 33 ? '1' : '');
                        case '2':
                            return match ($w) {
                                100 => '4',
                                75 => '3',
                                50 => '2',
                                25 => '1',
                                default => '0',
                            };
                        case '3':
                            return $w == 100 ? '3' : ($w == 33 ? '1' : '');
                        case '4':
                            return match ($w) {
                                25 => '1',
                                50 => '2',
                                75 => '3',
                                100 => '4',
                                default => '0',
                            };
                        case '5':
                            return match ($w) {
                                33 => '1',
                                100 => '3',
                                67 => '2',
                                default => '0',
                            };
                        default:
                            return $w . ' %';
                    }
                })

                ->addColumn('action', function ($row) {
                    $btn = '<form class="d-flex justify-content-center" method="POST" action="' . route('sub-criteria.destroy', encrypt($row["id"])) . '">
                                        ' . method_field("DELETE") . '
                                        ' . csrf_field() . '
                                        <a href="' . route("sub-criteria.edit", encrypt($row["id"])) . '" class=" btn btn-outline-warning m-1 btn-tooltip"><i class="ti ti-edit"></i></a>
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
        return view('feature.bo.sub_criteria.index', compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["menu"] = $this->menu;
        $data["form_status"] = "Tambah";
        $data["criteria"] = $this->criteria_repository->getAll();
        return view('feature.bo.sub_criteria.form', compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "id" => ['sometimes', 'nullable', 'string'],
            "criteria_id" => ['required', 'string'],
            "name" => ['required', 'string', 'max:255'],
            "weight" => ['required', 'integer', 'between:0,5'] // hanya bisa 0–5
        ], [], [
            "criteria_id" => "Kriteria",
            "name" => "Nama sub kriteria",
            "weight" => "Bobot sub kriteria"
        ]);

        isset($data["id"])
            ? $data["updated_by"] = Auth::user()->id
            : $data["created_by"] = Auth::user()->id;

        try {
            $data["id"] = is_null($data["id"]) ? $data["id"] : decrypt($data['id']);
            $data["criteria_id"] = decrypt($data['criteria_id']);

            // Konversi nilai bobot dari angka 0–5 menjadi persen berdasarkan kriteria
            $criteria_id = (string) $data["criteria_id"];
            $inputWeight = (int) $data["weight"]; // input dari user 0–5

            switch ($criteria_id) {
                // case '1':
                // case '2':
                //     $data["weight"] = $inputWeight == 1 ? 100 : 0;
                //     break;
                case '1':
                    $data["weight"] = match ($inputWeight) {
                        1 => 33,
                        3 => 100,
                        default => 0,
                    };
                    break;
                case '2':
                    $data["weight"] = match ($inputWeight) {
                        1 => 25,
                        2 => 50,
                        3 => 75,
                        4 => 100,
                        default => 0,
                    };
                    break;
                case '3':
                   $data["weight"] = match ($inputWeight) {
                        1 => 33,
                        3 => 100,
                        default => 0,
                    };
                    break;
                case '4':
                    $data["weight"] = match ($inputWeight) {
                        1 => 25,
                        2 => 50,
                        3 => 75,
                        4 => 100,
                        default => 0,
                    };
                    break;
                case '5':
                    $data["weight"] = match ($inputWeight) {
                        1 => 33,
                        2 => 67,
                        3 => 100,
                        default => 0,
                    };
                    break;
                default:
                    $data["weight"] = 0;
                    break;
            }

            $this->repository->store($data);

            return redirect()->route('sub-criteria.index')->with('success', 'Berhasil menambah sub kriteria ' . $data["name"]);
        } catch (Exception $e) {
            if (env('APP_DEBUG')) {
                return $e->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat menyimpan sub kriteria")->withInput($request->input());
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
        $data["criteria"] = $this->criteria_repository->getAll();
        $data["record"] = $this->repository->getById(decrypt($id));
        return view('feature.bo.sub_criteria.form', compact("data"));
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
            return redirect()->route('sub-criteria.index')->with('success', 'Kriteria berhasil dihapus');
        } catch (Exception $e) {
            if (env('APP_DEBUG')) {
                return $e->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat menghapus kriteria");
        }
    }
}
