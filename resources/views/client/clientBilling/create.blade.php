@extends('layouts.master')

@section('content')
<form method="POST" action="{{route('client.billing.store', ['client' => $client->id])}}" enctype="multipart/form-data">
@csrf
@include('client.clientBilling.partial.form')
<button type="submit" class="btn btn-primary btn-block">Create</button>
</form>
@endsection