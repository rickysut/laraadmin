<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDesaRequest;
use App\Http\Requests\UpdateDesaRequest;
use App\Http\Resources\Admin\DesaResource;
use App\Models\Desa;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DesaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('desa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DesaResource(Desa::with(['kd_kec'])->get());
    }

    public function store(StoreDesaRequest $request)
    {
        $desa = Desa::create($request->all());

        return (new DesaResource($desa))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Desa $desa)
    {
        abort_if(Gate::denies('desa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DesaResource($desa->load(['kd_kec']));
    }

    public function update(UpdateDesaRequest $request, Desa $desa)
    {
        $desa->update($request->all());

        return (new DesaResource($desa))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Desa $desa)
    {
        abort_if(Gate::denies('desa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $desa->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
