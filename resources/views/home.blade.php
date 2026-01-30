@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <p class="text-muted mb-0">Welcome back, {{ Auth::user()->name }}!</p>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="icon-box blue">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <div class="label">Total Clients</div>
                    <div class="value">{{ number_format($stats['clients_count']) }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="icon-box purple">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <div class="stat-info">
                    <div class="label">Total Billings</div>
                    <div class="value">{{ number_format($stats['billings_count']) }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="icon-box green">
                    <i class="fas fa-wallet"></i>
                </div>
                <div class="stat-info">
                    <div class="label">Revenue</div>
                    <div class="value">${{ number_format($stats['total_amount'] / 100, 2) }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Clients -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <span>Recent Clients</span>
                    <a href="{{ route('client.index') }}" class="btn btn-sm btn-light text-primary font-weight-bold">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Email</th>
                                    <th>Joined</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stats['recent_clients'] as $client)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle mr-3 avatar-bg-{{ strtolower(substr(trim($client->name), 0, 1)) }}" style="width: 32px; height: 32px; font-size: 0.8rem;">
                                                @if($client->photo && Storage::disk('public')->exists($client->photo))
                                                    <img src="{{ Storage::url($client->photo) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                                @else
                                                    {{ strtoupper(substr(trim($client->name), 0, 1)) }}
                                                @endif
                                            </div>
                                            <span class="font-weight-medium">{{ $client->name }}</span>
                                        </div>
                                    </td>
                                    <td class="text-muted">{{ $client->email }}</td>
                                    <td class="text-muted">{{ $client->created_at->format('M d, Y') }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('client.edit', $client) }}" class="btn btn-sm btn-light"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Quick Actions</div>
                <div class="card-body">
                    <a href="{{ route('client.create') }}" class="btn btn-primary btn-block mb-3 d-flex align-items-center justify-content-center gap-2">
                        <i class="fas fa-plus"></i> New Client
                    </a>
                    <p class="text-sm text-muted text-center">Manage your clients and their billings efficiently from this modern dashboard.</p>
                </div>
            </div>
            
            <!-- App Summary -->
            <div class="card bg-indigo text-white" style="background: linear-gradient(135deg, #4f46e5 0%, #8b5cf6 100%);">
                <div class="card-body py-4">
                    <h5 class="font-weight-bold mb-3">System Report</h5>
                    <p class="text-white-50 small mb-4">Your ledger is up to date. You have {{ $stats['billings_count'] }} pending or settled billings.</p>
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                            <div class="h4 mb-0 font-weight-bold">100%</div>
                            <div class="small opacity-75">Efficiency</div>
                        </div>
                        <i class="fas fa-chart-line fa-3x opacity-25 ml-auto"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
