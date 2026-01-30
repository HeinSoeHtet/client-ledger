<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClient;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index', ['clients' => Client::orderBy('id', 'desc')->cursorPaginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClient  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClient $request)
    {
        $validatedData = $request->validated();
        $client = new Client($validatedData);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos');
            $client->photo = $path;
        }

        $client->save();

        return redirect()->route('client.index')
            ->with('status', 'Client is successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreClient  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClient $request, Client $client)
    {
        $validatedData = $request->validated();
        $client->fill($validatedData);

        if ($request->hasFile('photo')) {
            if ($client->photo) {
                Storage::delete($client->photo);
            }
            $path = $request->file('photo')->store('photos');
            $client->photo = $path;
        }

        $client->save();

        return redirect()->route('client.index')
            ->with('status', 'Client with ID ' . $client->id . ' is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if ($client->photo) {
            Storage::delete($client->photo);
        }
        $client->delete();

        return redirect()->route('client.index')
            ->with('status', 'Client ID ' . $client->id . ' is successfully deleted');
    }
}
