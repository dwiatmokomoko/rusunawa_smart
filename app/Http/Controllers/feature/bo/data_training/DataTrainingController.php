<?php

namespace App\Http\Controllers\feature\bo\data_training;

use App\Http\Controllers\Controller;
use App\Repositories\CriteriaRepository;
use App\Repositories\DataTrainingRepository;
use App\Repositories\SubCriteriaRepository;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataTrainingController extends Controller
{
    private $menu;
    private DataTrainingRepository $repository;
    private CriteriaRepository $criteriaRepository;

    function __construct(DataTrainingRepository $repository, CriteriaRepository $criteriaRepository)
    {
        $this->menu = "Data Latih";
        $this->repository = $repository;
        $this->criteriaRepository = $criteriaRepository;
    }

    function datas(Request $request)
    {
        if ($request->ajax()) {
            try {
                $data = $this->repository->getDataTraining();
                // dd($data);
            } catch (Exception $e) {
                dd($e);
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn("kelayakan", function ($row) {
                    return ($row->kelayakan == 1) ? "<p class='text-success font-weight-bold'>Layak<p/>" : "<p class='text-danger font-weight-bold'>Tidak Layak<p/>";
                })
                ->rawColumns(['kelayakan'])
                ->make(true);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["criteria"] = $this->criteriaRepository->getAll()->toArray();
        $data["menu"] = $this->menu;
        return view('feature.bo.data_training.index', compact("data"));
    }
}
