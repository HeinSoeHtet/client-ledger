@extends('layouts.master')

@section('title', 'Edit Client - ' . $client->name)

@section('content')
<form action="{{route('client.update', ['client' => $client->id])}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
@include('client.partial.form')
<button type="submit" class="btn btn-primary btn-block">Update</button>
</form>
@endsection