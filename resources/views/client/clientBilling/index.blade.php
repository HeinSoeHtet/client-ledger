@extends('layouts.master')

@section('title', 'Billing History - ' . $client->name)

@section('content')
<div class="container-fluid">
    <!-- Client Profile Header -->
    <div class="card mb-4 overflow-hidden border-0">
        <div class="card-body p-0">
            <div class="row g-0">
                <div class="col-md-3 bg-light d-flex align-items-center justify-content-center py-4">
                    @if($client->photo && Storage::disk('public')->exists($client->photo))
                        <img src="{{ Storage::url($client->photo) }}" class="img-fluid rounded-circle shadow-sm" style="width: 150px; height: 150px; object-fit: cover;" alt="{{ $client->name }}">
                    @else
                        <div class="avatar-circle avatar-bg-{{ strtolower(substr(trim($client->name), 0, 1)) }} shadow-sm" style="width: 150px; height: 150px; font-size: 4rem;">
                            {{ strtoupper(substr(trim($client->name), 0, 1)) }}
                        </div>
                    @endif
                </div>
                <div class="col-md-9 p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h2 class="font-weight-bold mb-1">{{ $client->name }}</h2>
                            <p class="text-muted mb-3"><i class="far fa-envelope mr-1"></i> {{ $client->email }}</p>
                            <div class="d-flex gap-4">
                                <div class="small"><strong>Phone:</strong> <span class="text-muted">{{ $client->phone }}</span></div>
                                <div class="small"><strong>Address:</strong> <span class="text-muted">{{ $client->address }}</span></div>
                            </div>
                        </div>
                        <a href="{{ route('client.edit', $client) }}" class="btn btn-sm btn-outline-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Billings Table -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Billing Records</h3>
        </div>
        <div class="card-body p-0">
            @if (count($billings))
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Amount</th>
                            <th>Due Date</th>
                            <th>Description</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($billings as $billing)
                        <tr>
                            <td class="text-muted font-weight-medium">#{{ $billing->id }}</td>
                            <td><span class="font-weight-bold text-success">${{ number_format($billing->amount / 100, 2) }}</span></td>
                            <td>
                                <span class="badge badge-soft-indigo">
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ $billing->due_date ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="text-muted small" style="max-width: 300px;">{{ $billing->description }}</td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <a href="{{ route('client.billing.edit', ['client' => $client, 'billing' => $billing]) }}" class="btn btn-sm btn-light text-primary mr-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('client.billing.destroy', ['client' => $client, 'billing' => $billing]) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this record?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light text-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-5">
                <i class="fas fa-file-invoice-dollar fa-3x text-light mb-3"></i>
                <h5 class="text-muted">No Billing Information found for this client.</h5>
            </div>
            @endif
        </div>
        @if (count($billings))
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-center">
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item {{ $billings->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $billings->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item {{ $billings->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $billings->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        @endif
    </div>

    <!-- Floating Action Button -->
    <a href="{{ route('client.billing.create', $client) }}" class="btn btn-primary btn-fab" title="Add New Billing">
        <i class="fas fa-plus"></i>
    </a>
</div>
@endsection