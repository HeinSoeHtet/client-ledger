
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Client Ledger - @yield('title', 'Dashboard')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/fontawesome.css')}}" type="text/css">
<link rel="preload" href="{{ asset('webfonts/fa-solid-900.woff2') }}" as="font" type="font/woff2" crossorigin>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<nav class="main-header navbar navbar-expand navbar-white navbar-light px-3 py-2">
  <ul class="navbar-nav align-items-center w-100">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item ml-2">
      <h5 class="mb-0 font-weight-bold text-dark">@yield('title', 'Dashboard')</h5>
    </li>
  </ul>
</nav>


<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="{{route('home')}}" class="brand-link">
<img src="{{ asset('img/logo.png') }}" alt="App Logo" class="brand-image elevation-3" style="opacity: .9">
<span class="brand-text font-weight-light">Client Ledger</span>
</a>

<div class="sidebar">




<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

<li class="nav-item">
<a href="{{route('home')}}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
<i class="nav-icon fas fa-home"></i>
<p>Dashboard</p>
</a>
</li>

<li class="nav-item">
<a href="{{route('client.index')}}" class="nav-link {{ request()->routeIs('client.*') ? 'active' : '' }}">
<i class="nav-icon fas fa-users"></i>
<p>Clients</p>
</a>
</li>

<li class="nav-item">
<a href="{{route('billing.index')}}" class="nav-link {{ request()->routeIs('billing.*') ? 'active' : '' }}">
<i class="nav-icon fas fa-file-invoice-dollar"></i>
<p>Billings</p>
</a>
</li>

<li class="nav-header">ACCOUNT</li>
<li class="nav-item px-3 mb-1">
    <small class="text-muted text-uppercase" style="font-size: 0.65rem; letter-spacing: 0.05em;">
        User: {{ Auth::user()->email }}
    </small>
</li>
<li class="nav-item">
<a class="nav-link" href="{{ route('logout') }}"
onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
 <i class="nav-icon fas fa-sign-out-alt"></i>
 <p>{{ __('Logout') }}</p>
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
   </form>
</li>
</ul>
</nav>

</div>

</aside>

<div class="content-wrapper" style="padding: 20px">

    @yield('content')

    <div class="container" style="margin-top: 20px">
        @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
        @endif
    </div>


{{-- <div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Starter Page</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Starter Page</li>
</ol>
</div>
</div>
</div>
</div> --}}


{{-- <div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-6">
<div class="card">
<div class="card-body">
<h5 class="card-title">Card title</h5>
<p class="card-text">
Some quick example text to build on the card title and make up the bulk of the card's
content.
</p>
<a href="#" class="card-link">Card link</a>
<a href="#" class="card-link">Another link</a>
</div>
</div>
<div class="card card-primary card-outline">
<div class="card-body">
<h5 class="card-title">Card title</h5>
<p class="card-text">
Some quick example text to build on the card title and make up the bulk of the card's
content.
</p>
<a href="#" class="card-link">Card link</a>
<a href="#" class="card-link">Another link</a>
</div>
</div>
</div>

<div class="col-lg-6">
<div class="card">
<div class="card-header">
<h5 class="m-0">Featured</h5>
</div>
<div class="card-body">
<h6 class="card-title">Special title treatment</h6>
<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
<a href="#" class="btn btn-primary">Go somewhere</a>
</div>
</div>
<div class="card card-primary card-outline">
<div class="card-header">
<h5 class="m-0">Featured</h5>
</div>
<div class="card-body">
<h6 class="card-title">Special title treatment</h6>
<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
<a href="#" class="btn btn-primary">Go somewhere</a>
</div>
</div>
</div>
 
</div>

</div>
</div> --}}

</div>


<aside class="control-sidebar control-sidebar-dark">

<div class="p-3">
<h5>Title</h5>
<p>Sidebar content</p>
</div>
</aside>


</div>

<script src="{{asset('js/app.js')}}" defer></script>

</body>
</html>
