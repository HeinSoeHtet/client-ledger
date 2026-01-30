@extends('layouts.master')

@section('content')
<form action="{{route('client.billing.update', ['client' => $client, 'billing' => $billing->id])}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
@include('client.clientBilling.partial.form')
<button type="submit" class="btn btn-primary btn-block">Update</button>
</form>
@endsection