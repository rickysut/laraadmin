<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyKabupatenRequest;
use App\Http\Requests\StoreKabupatenRequest;
use App\Http\Requests\UpdateKabupatenRequest;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KabupatenController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('kabupaten_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Kabupaten::with(['kd_prop'])->select(sprintf('%s.*', (new Kabupaten())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'kabupaten_show';
                $editGate = 'kabupaten_edit';
                $deleteGate = 'kabupaten_delete';
                $crudRoutePart = 'kabupatens';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->addColumn('kd_prop_kd_prop', function ($row) {
                return $row->kd_prop ? $row->kd_prop->kd_prop.' - '.$row->kd_prop->nm_prop : '';
            });

            /*$table->editColumn('kd_prop.nm_prop', function ($row) {
                return $row->kd_prop ? (is_string($row->kd_prop) ? $row->kd_prop : $row->kd_prop->nm_prop) : '';
            });
            */
            $table->editColumn('kd_kab', function ($row) {
                return $row->kd_kab ? $row->kd_kab : '';
            });
            $table->editColumn('nama_kab', function ($row) {
                return $row->nama_kab ? $row->nama_kab : '';
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
            

            $table->rawColumns(['actions', 'placeholder', 'kd_prop']);

            return $table->make(true);
        }

        return view('admin.kabupatens.index');
    }

    public function create()
    {
        abort_if(Gate::denies('kabupaten_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kd_props = Provinsi::pluck('nm_prop', 'kd_prop')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.kabupatens.create', compact('kd_props'));
    }

    public function store(StoreKabupatenRequest $request)
    {
        $kabupaten = Kabupaten::create($request->all());

        return redirect()->route('admin.kabupatens.index');
    }

    public function edit(Kabupaten $kabupaten)
    {
        abort_if(Gate::denies('kabupaten_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kd_props = Provinsi::pluck('nm_prop', 'kd_prop')->prepend(trans('global.pleaseSelect'), '');

        $kabupaten->load('kd_prop');

        return view('admin.kabupatens.edit', compact('kabupaten', 'kd_props'));
    }

    public function update(UpdateKabupatenRequest $request, Kabupaten $kabupaten)
    {
        $kabupaten->update($request->all());

        return redirect()->route('admin.kabupatens.index');
    }

    public function show(Kabupaten $kabupaten)
    {
        abort_if(Gate::denies('kabupaten_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kabupaten->load('kd_prop');

        return view('admin.kabupatens.show', compact('kabupaten'));
    }

    public function destroy(Kabupaten $kabupaten)
    {
        abort_if(Gate::denies('kabupaten_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kabupaten->delete();

        return back();
    }

    public function massDestroy(MassDestroyKabupatenRequest $request)
    {
        Kabupaten::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
