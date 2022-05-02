<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSatkerRequest;
use App\Http\Requests\UpdateSatkerRequest;
use App\Http\Resources\Admin\SatkerResource;
use App\Models\Satker;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SatkerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('satker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SatkerResource(Satker::all());
    }

    public function store(StoreSatkerRequest $request)
    {
        $satker = Satker::create($request->all());

        return (new SatkerResource($satker))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Satker $satker)
    {
        abort_if(Gate::denies('satker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SatkerResource($satker);
    }

    public function update(UpdateSatkerRequest $request, Satker $satker)
    {
        $satker->update($request->all());

        return (new SatkerResource($satker))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Satker $satker)
    {
        abort_if(Gate::denies('satker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $satker->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
