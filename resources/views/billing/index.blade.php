@extends('layouts.master')

@section('title', 'Billings')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">All Billings</h3>
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
                            <th>Client</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($billings as $billing)
                        <tr>
                            <td class="text-muted font-weight-medium">#{{ $billing->id }}</td>
                            <td>
                                <span class="font-weight-bold text-success">${{ number_format($billing->amount / 100, 2) }}</span>
                            </td>
                            <td>
                                <span class="badge badge-soft-indigo">
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ $billing->due_date ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="text-muted small" style="max-width: 250px;">{{ Str::limit($billing->description, 50) }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="font-weight-medium">{{ $billing->client->name }}</span>
                                    <span class="badge badge-light ml-2 text-muted">#{{ $billing->client_id }}</span>
                                </div>
                            </td>
                            <td class="text-right">
                                <form action="{{ route('billing.destroy', $billing) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this billing record?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light text-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-5">
                <i class="fas fa-file-invoice-dollar fa-3x text-light mb-3"></i>
                <h5 class="text-muted">No Billing Information</h5>
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
    <a href="{{ route('billing.create') }}" class="btn btn-primary btn-fab" title="Create New Billing">
        <i class="fas fa-plus"></i>
    </a>
</div>
@endsection