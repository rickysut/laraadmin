<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyKecamatanRequest;
use App\Http\Requests\StoreKecamatanRequest;
use App\Http\Requests\UpdateKecamatanRequest;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KecamatanController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('kecamatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Kecamatan::with(['kd_kab'])->select(sprintf('%s.*', (new Kecamatan())->table));
            $table = Datatables::of($query);
            
            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'kecamatan_show';
                $editGate = 'kecamatan_edit';
                $deleteGate = 'kecamatan_delete';
                $crudRoutePart = 'kecamatans';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            
            $table->editColumn('kd_kab_id', function ($row) {
                return $row->kd_kab ? $row->kd_kab->id : '';
            });
            
            $table->addColumn('kd_kab_kd_kab', function ($row) {
                return $row->kd_kab ? $row->kd_kab->kd_kab.' - '.$row->kd_kab->nama_kab : '';
            });

            
            $table->editColumn('kd_kec', function ($row) {
                return $row->kd_kec ? $row->kd_kec : '';
            });
            $table->editColumn('nm_kec', function ($row) {
                return $row->nm_kec ? $row->nm_kec : '';
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
            
            $table->rawColumns(['actions', 'placeholder', 'kd_kab']);
           
            return $table->make(true);
        }

        return view('admin.kecamatans.index');
    }

    public function create()
    {
        abort_if(Gate::denies('kecamatan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kd_kabs = Kabupaten::pluck('nama_kab', 'kd_kab')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.kecamatans.create', compact('kd_kabs'));
    }

    public function store(StoreKecamatanRequest $request)
    {
        $kecamatan = Kecamatan::create($request->all());

        return redirect()->route('admin.kecamatans.index');
    }

    public function edit(Kecamatan $kecamatan)
    {
        abort_if(Gate::denies('kecamatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kd_kabs = Kabupaten::pluck('nama_kab', 'kd_kab')->prepend(trans('global.pleaseSelect'), '');

        $kecamatan->load('kd_kab');

        return view('admin.kecamatans.edit', compact('kecamatan','kd_kabs'));
    }

    public function update(UpdateKecamatanRequest $request, Kecamatan $kecamatan)
    {
        $kecamatan->update($request->all());

        return redirect()->route('admin.kecamatans.index');
    }

    public function show(Kecamatan $kecamatan)
    {
        abort_if(Gate::denies('kecamatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kecamatan->load('kd_kab');

        return view('admin.kecamatans.show', compact('kecamatan'));
    }

    public function destroy(Kecamatan $kecamatan)
    {
        abort_if(Gate::denies('kecamatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kecamatan->delete();

        return back();
    }

    public function massDestroy(MassDestroyKecamatanRequest $request)
    {
        Kecamatan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
