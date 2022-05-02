<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySatkerRequest;
use App\Http\Requests\StoreSatkerRequest;
use App\Http\Requests\UpdateSatkerRequest;
use App\Models\Satker;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SatkerController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('satker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Satker::query()->select(sprintf('%s.*', (new Satker())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'satker_show';
                $editGate = 'satker_edit';
                $deleteGate = 'satker_delete';
                $crudRoutePart = 'satkers';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('kd_satker', function ($row) {
                return $row->kd_satker ? $row->kd_satker : '';
            });
            $table->editColumn('nm_satker', function ($row) {
                return $row->nm_satker ? $row->nm_satker : '';
            });
            $table->editColumn('kd_kwn', function ($row) {
                return $row->kd_kwn ? $row->kd_kwn : '';
            });
            $table->editColumn('kwn', function ($row) {
                return $row->kwn ? $row->kwn : '';
            });
            $table->editColumn('tingkat', function ($row) {
                return $row->tingkat ? $row->tingkat : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Satker::STATUS_SELECT[$row->status] : 'Non-Aktif';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.satkers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('satker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.satkers.create');
    }

    public function store(StoreSatkerRequest $request)
    {
        $satker = Satker::create($request->all());

        return redirect()->route('admin.satkers.index');
    }

    public function edit(Satker $satker)
    {
        abort_if(Gate::denies('satker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.satkers.edit', compact('satker'));
    }

    public function update(UpdateSatkerRequest $request, Satker $satker)
    {
        $satker->update($request->all());

        return redirect()->route('admin.satkers.index');
    }

    public function show(Satker $satker)
    {
        abort_if(Gate::denies('satker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.satkers.show', compact('satker'));
    }

    public function destroy(Satker $satker)
    {
        abort_if(Gate::denies('satker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $satker->delete();

        return back();
    }

    public function massDestroy(MassDestroySatkerRequest $request)
    {
        Satker::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
