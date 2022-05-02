<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyBelanjaRequest;
use App\Http\Requests\StoreBelanjaRequest;
use App\Http\Requests\UpdateBelanjaRequest;
use App\Models\Belanja;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BelanjaController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('belanja_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Belanja::query()->select(sprintf('%s.*', (new Belanja())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'belanja_show';
                $editGate = 'belanja_edit';
                $deleteGate = 'belanja_delete';
                $crudRoutePart = 'belanjas';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('tahun', function ($row) {
                return $row->tahun ? $row->tahun : '';
            });
            $table->editColumn('kewenangan', function ($row) {
                return $row->kewenangan ? $row->kewenangan : '';
            });
            $table->editColumn('pagu', function ($row) {
                return $row->pagu ? number_format($row->pagu,2,',','.') : '';
            });
            $table->editColumn('realisasi', function ($row) {
                return $row->realisasi ? number_format($row->realisasi,2,',','.') : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.belanjas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('belanja_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.belanjas.create');
    }

    public function store(StoreBelanjaRequest $request)
    {
        $belanja = Belanja::create($request->all());

        return redirect()->route('admin.belanjas.index');
    }

    public function edit(Belanja $belanja)
    {
        abort_if(Gate::denies('belanja_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.belanjas.edit', compact('belanja'));
    }

    public function update(UpdateBelanjaRequest $request, Belanja $belanja)
    {
        $belanja->update($request->all());

        return redirect()->route('admin.belanjas.index');
    }

    public function show(Belanja $belanja)
    {
        abort_if(Gate::denies('belanja_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.belanjas.show', compact('belanja'));
    }

    public function destroy(Belanja $belanja)
    {
        abort_if(Gate::denies('belanja_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $belanja->delete();

        return back();
    }

    public function massDestroy(MassDestroyBelanjaRequest $request)
    {
        Belanja::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
