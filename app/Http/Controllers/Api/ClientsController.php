<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateClientsRequest;
use App\Http\Resources\ClientsResource;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\StoreClientsRequest;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return ClientsResource::collection($clients);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientsRequest $request)
    {
        $clients = Client::create($request->validated());
        return new ClientsResource($clients); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $clients=  Client::findOrFail($id);
        return new ClientsResource($clients);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientsRequest $request, string $id)
    {
        $clients =  Client::findOrFail($id);
        $clients->update($request->validated());
        return new ClientsResource($clients); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clients =  Client::findOrFail($id);
        $clients->delete();
        return response()-> json(null, 204);
    }
}
