<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDesaRequest;
use App\Http\Requests\StoreDesaRequest;
use App\Http\Requests\UpdateDesaRequest;
use App\Models\Desa;
use App\Models\Kecamatan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DesaController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('desa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Desa::with(['kd_kec'])->select(sprintf('%s.*', (new Desa())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'desa_show';
                $editGate = 'desa_edit';
                $deleteGate = 'desa_delete';
                $crudRoutePart = 'desas';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->addColumn('kd_kec_kd_kec', function ($row) {
                return $row->kd_kec ? $row->kd_kec->kd_kec.' - '.$row->kd_kec->nm_kec : '';
            });

            /*$table->editColumn('kd_kec.nm_kec', function ($row) {
                return $row->kd_kec ? (is_string($row->kd_kec) ? $row->kd_kec : $row->kd_kec->nm_kec) : '';
            });*/
            $table->editColumn('kd_desa', function ($row) {
                return $row->kd_desa ? $row->kd_desa : '';
            });
            $table->editColumn('nm_desa', function ($row) {
                return $row->nm_desa ? $row->nm_desa : '';
            });
            $table->editColumn('kd_bast', function ($row) {
                return $row->kd_bast ? $row->kd_bast : '';
            });
            
            $table->editColumn('lat', function ($row) {
                return $row->lat ? $row->lat : 0;
            });
            $table->editColumn('lng', function ($row) {
                return $row->lng ? $row->lng : 0;
            });
            

            $table->rawColumns(['actions', 'placeholder', 'kd_kec']);

            return $table->make(true);
        }

        return view('admin.desas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('desa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kd_kecs = Kecamatan::pluck('nm_kec', 'kd_kec')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.desas.create', compact('kd_kecs'));
    }

    public function store(StoreDesaRequest $request)
    {
        $desa = Desa::create($request->all());

        return redirect()->route('admin.desas.index');
    }

    public function edit(Desa $desa)
    {
        abort_if(Gate::denies('desa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kd_kecs = Kecamatan::pluck('nm_kec', 'kd_kec')->prepend(trans('global.pleaseSelect'), '');

        $desa->load('kd_kec');

        return view('admin.desas.edit', compact('desa', 'kd_kecs'));
    }

    public function update(UpdateDesaRequest $request, Desa $desa)
    {
        $desa->update($request->all());

        return redirect()->route('admin.desas.index');
    }

    public function show(Desa $desa)
    {
        abort_if(Gate::denies('desa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $desa->load('kd_kec');

        return view('admin.desas.show', compact('desa'));
    }

    public function destroy(Desa $desa)
    {
        abort_if(Gate::denies('desa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $desa->delete();

        return back();
    }

    public function massDestroy(MassDestroyDesaRequest $request)
    {
        Desa::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
