<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stats = [
            'clients_count' => \App\Models\Client::count(),
            'billings_count' => \App\Models\Billing::count(),
            'total_amount' => \App\Models\Billing::sum('amount'),
            'recent_clients' => \App\Models\Client::latest()->take(5)->get(),
        ];
        return view('home', compact('stats'));
    }
}
