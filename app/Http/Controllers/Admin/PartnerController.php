<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPartnerRequest;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartnerController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('partner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = Partner::with(['created_by'])->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        abort_if(Gate::denies('partner_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partners.create');
    }

    public function store(StorePartnerRequest $request)
    {
        $partner = Partner::create($request->all());

        return redirect()->route('admin.partners.index');
    }

    public function edit(Partner $partner)
    {
        abort_if(Gate::denies('partner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partner->load('created_by');

        return view('admin.partners.edit', compact('partner'));
    }

    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        $partner->update($request->all());

        return redirect()->route('admin.partners.index');
    }

    public function destroy(Partner $partner)
    {
        abort_if(Gate::denies('partner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partner->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartnerRequest $request)
    {
        Partner::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}