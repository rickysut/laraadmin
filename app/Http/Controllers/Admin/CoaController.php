<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCoaRequest;
use App\Http\Requests\StoreCoaRequest;
use App\Http\Requests\UpdateCoaRequest;
use App\Models\Coa;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CoaController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('coa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Coa::with(['coa_parent', 'created_by'])->select(sprintf('%s.*', (new Coa())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'coa_show';
                $editGate = 'coa_edit';
                $deleteGate = 'coa_delete';
                $crudRoutePart = 'coas';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('coa_code', function ($row) {
                return $row->coa_code ? $row->coa_code : '';
            });
            $table->editColumn('coa_name', function ($row) {
                return $row->coa_name ? $row->coa_name : '';
            });
            $table->addColumn('coa_parent_coa_code', function ($row) {
                return $row->coa_parent ? $row->coa_parent->coa_code : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'coa_parent']);

            return $table->make(true);
        }

        return view('admin.coas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('coa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coa_parents = Coa::pluck('coa_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.coas.create', compact('coa_parents'));
    }

    public function store(StoreCoaRequest $request)
    {
        $coa = Coa::create($request->all());

        return redirect()->route('admin.coas.index');
    }

    public function edit(Coa $coa)
    {
        abort_if(Gate::denies('coa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coa_parents = Coa::pluck('coa_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $coa->load('coa_parent', 'created_by');

        return view('admin.coas.edit', compact('coa', 'coa_parents'));
    }

    public function update(UpdateCoaRequest $request, Coa $coa)
    {
        $coa->update($request->all());

        return redirect()->route('admin.coas.index');
    }

    public function show(Coa $coa)
    {
        abort_if(Gate::denies('coa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coa->load('coa_parent', 'created_by');

        return view('admin.coas.show', compact('coa'));
    }

    public function destroy(Coa $coa)
    {
        abort_if(Gate::denies('coa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coa->delete();

        return back();
    }

    public function massDestroy(MassDestroyCoaRequest $request)
    {
        Coa::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}