@extends('layouts.master')

@section('title', 'Clients')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Client List</h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact Info</th>
                            <th>Address</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                        <tr>
                            <td class="text-muted font-weight-medium">#{{ $client->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle mr-3 avatar-bg-{{ strtolower(substr(trim($client->name), 0, 1)) }}">
                                        @if($client->photo && Storage::disk('public')->exists($client->photo))
                                            <img src="{{ Storage::url($client->photo) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        @else
                                            {{ strtoupper(substr(trim($client->name), 0, 1)) }}
                                        @endif
                                    </div>
                                    <span class="font-weight-bold text-dark">{{ $client->name }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="small">
                                    <div class="text-dark"><i class="far fa-envelope mr-1 text-muted"></i> {{ $client->email }}</div>
                                    <div class="text-muted"><i class="fas fa-phone-alt mr-1 text-muted"></i> {{ $client->phone }}</div>
                                </div>
                            </td>
                            <td class="text-muted small">{{ $client->address }}</td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <a href="{{ route('client.billing.index', $client) }}" class="btn btn-sm btn-light text-indigo mr-1" title="Billing Details">
                                        <i class="fas fa-file-invoice"></i>
                                    </a>
                                    <a href="{{ route('client.edit', $client) }}" class="btn btn-sm btn-light text-primary mr-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('client.destroy', $client) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this client?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light text-danger" title="Delete">
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
        </div>
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-center">
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item {{ $clients->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $clients->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item {{ $clients->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $clients->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Floating Action Button -->
    <a href="{{ route('client.create') }}" class="btn btn-primary btn-fab" title="Create New Client">
        <i class="fas fa-plus"></i>
    </a>
</div>
@endsection