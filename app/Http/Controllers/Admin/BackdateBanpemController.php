<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyBackdateBanpemRequest;
use App\Http\Requests\StoreBackdateBanpemRequest;
use App\Http\Requests\UpdateBackdateBanpemRequest;
use App\Models\Akun;
use App\Models\BackdateBanpem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BackdateBanpemController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('backdate_banpem_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BackdateBanpem::with(['kd_akun'])->select(sprintf('%s.*', (new BackdateBanpem())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'backdate_banpem_show';
                $editGate = 'backdate_banpem_edit';
                $deleteGate = 'backdate_banpem_delete';
                $crudRoutePart = 'backdate-banpems';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('year', function ($row) {
                return $row->year ? $row->year : '';
            });
            $table->addColumn('kd_akun_kd_akun', function ($row) {
                return $row->kd_akun ? $row->kd_akun->kd_akun : '';
            });

            $table->editColumn('kd_akun.nama_akun', function ($row) {
                return $row->kd_akun ? (is_string($row->kd_akun) ? $row->kd_akun : $row->kd_akun->nama_akun) : '';
            });
            $table->editColumn('kd_akun.jenis', function ($row) {
                return $row->kd_akun ? (is_string($row->kd_akun) ? $row->kd_akun : $row->kd_akun->jenis) : '';
            });
            $table->editColumn('nom_pagu', function ($row) {
                return $row->nom_pagu ? number_format($row->nom_pagu,2,',','.') : '';
            });
            $table->editColumn('nom_realisasi', function ($row) {
                return $row->nom_realisasi ? number_format($row->nom_realisasi,2,',','.') : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'kd_akun']);

            return $table->make(true);
        }

        return view('admin.backdateBanpems.index');
    }

    public function create()
    {
        abort_if(Gate::denies('backdate_banpem_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kd_akuns = Akun::pluck('nama_akun', 'kd_akun')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.backdateBanpems.create', compact('kd_akuns'));
    }

    public function store(StoreBackdateBanpemRequest $request)
    {
        $backdateBanpem = BackdateBanpem::create($request->all());

        return redirect()->route('admin.backdate-banpems.index');
    }

    public function edit(BackdateBanpem $backdateBanpem)
    {
        abort_if(Gate::denies('backdate_banpem_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kd_akuns = Akun::pluck('nama_akun', 'kd_akun')->prepend(trans('global.pleaseSelect'), '');

        $backdateBanpem->load('kd_akun');

        return view('admin.backdateBanpems.edit', compact('backdateBanpem', 'kd_akuns'));
    }

    public function update(UpdateBackdateBanpemRequest $request, BackdateBanpem $backdateBanpem)
    {
        $backdateBanpem->update($request->all());

        return redirect()->route('admin.backdate-banpems.index');
    }

    public function show(BackdateBanpem $backdateBanpem)
    {
        abort_if(Gate::denies('backdate_banpem_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $backdateBanpem->load('kd_akun');

        return view('admin.backdateBanpems.show', compact('backdateBanpem'));
    }

    public function destroy(BackdateBanpem $backdateBanpem)
    {
        abort_if(Gate::denies('backdate_banpem_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $backdateBanpem->delete();

        return back();
    }

    public function massDestroy(MassDestroyBackdateBanpemRequest $request)
    {
        BackdateBanpem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
