@extends('welcome')
@section('content')
    <div class="m-3">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand btn btn-warning" href="#">Imfeelinglucky</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Refresh account Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Delete account Link</a>
                        </li>
                    </ul>
                    <div class="d-flex card">
                        <div class="card-header">
                            Account: {{\Illuminate\Support\Facades\Auth::user()->username ?? ''}}
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
@endsection
