<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyProvinsiRequest;
use App\Http\Requests\StoreProvinsiRequest;
use App\Http\Requests\UpdateProvinsiRequest;
use App\Models\Provinsi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProvinsiController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('provinsi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Provinsi::query()->select(sprintf('%s.*', (new Provinsi())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'provinsi_show';
                $editGate = 'provinsi_edit';
                $deleteGate = 'provinsi_delete';
                $crudRoutePart = 'provinsis';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('kd_prop', function ($row) {
                return $row->kd_prop ? $row->kd_prop : '';
            });
            $table->editColumn('nm_prop', function ($row) {
                return $row->nm_prop ? $row->nm_prop : '';
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
            $table->editColumn('no_satker', function ($row) {
                return $row->no_satker ? $row->no_satker : '';
            });
            

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.provinsis.index');
    }

    public function create()
    {
        abort_if(Gate::denies('provinsi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.provinsis.create');
    }

    public function store(StoreProvinsiRequest $request)
    {
        $provinsi = Provinsi::create($request->all());

        return redirect()->route('admin.provinsis.index');
    }

    public function edit(Provinsi $provinsi)
    {
        abort_if(Gate::denies('provinsi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.provinsis.edit', compact('provinsi'));
    }

    public function update(UpdateProvinsiRequest $request, Provinsi $provinsi)
    {
        $provinsi->update($request->all());

        return redirect()->route('admin.provinsis.index');
    }

    public function show(Provinsi $provinsi)
    {
        abort_if(Gate::denies('provinsi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.provinsis.show', compact('provinsi'));
    }

    public function destroy(Provinsi $provinsi)
    {
        abort_if(Gate::denies('provinsi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provinsi->delete();

        return back();
    }

    public function massDestroy(MassDestroyProvinsiRequest $request)
    {
        Provinsi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
