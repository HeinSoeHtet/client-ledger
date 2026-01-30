@extends('layouts.master')

@section('title', 'New Billing')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Create New Billing</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('billing.store') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label>Select Client</label>
                        <select name="client_id" class="form-control @error('client_id') is-invalid @enderror" required>
                            <option value="">-- Choose Client --</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                    {{ $client->name }} ({{ $client->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('client_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @include('client.clientBilling.partial.form')

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary btn-block py-2 font-weight-bold">
                            <i class="fas fa-save mr-1"></i> Create Billing
                        </button>
                        <a href="{{ route('billing.index') }}" class="btn btn-light btn-block mt-2 text-muted">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
