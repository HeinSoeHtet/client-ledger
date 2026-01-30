@extends('layouts.master')

@section('title', 'New Client')

@section('content')
<form method="POST" action="{{route('client.store')}}" enctype="multipart/form-data">
@csrf
@include('client.partial.form')
<button type="submit" class="btn btn-primary btn-block">Create</button>
</form>
@endsection