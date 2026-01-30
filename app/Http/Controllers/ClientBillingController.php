<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBilling;
use App\Models\Client;
use App\Models\Billing;
use Illuminate\Http\Request;

class ClientBillingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Client $client)
    {
        return view(
            'client.clientBilling.index',
            [
                'billings' => Billing::where('client_id', '=', $client->id)->orderBy('id', 'desc')->cursorPaginate(10),
                'client' => $client
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        return view('client.clientBilling.create', ['client' => $client]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBilling  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBilling $request, Client $client)
    {
        $validatedData = $request->validated();
        $billing = new Billing($validatedData);
        $billing->client()->associate($client);
        $billing->save();

        return redirect()->route('client.billing.index', $client)
            ->with('status', 'Billing is successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client, Billing $billing)
    {
        return view('client.clientBilling.edit', compact('client', 'billing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreBilling  $request
     * @param  \App\Models\Client  $client
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBilling $request, Client $client, Billing $billing)
    {
        $validatedData = $request->validated();
        $billing->update($validatedData);

        return redirect()->route('client.billing.index', $client)
            ->with('status', 'Billing with ID ' . $billing->id . ' is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client, Billing $billing)
    {
        $billing->delete();

        return redirect()->route('client.billing.index', $client)
            ->with('status', 'Billing ID ' . $billing->id . ' is successfully deleted');
    }
}
