@extends('welcome')
@section('content')
    <div class="m-3">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand btn btn-warning" href="{{route('account.game', ['token' => \Illuminate\Support\Facades\Auth::user()->link_token])}}">Imfeelinglucky</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item m-1">
                            <a class="btn btn-outline-primary" href="{{route('account.history', ['token' => \Illuminate\Support\Facades\Auth::user()->link_token])}}">History</a>
                        </li>
                        <li class="nav-item m-1">
                            <a class="btn btn-outline-success" href="{{route('account.update', ['token' => \Illuminate\Support\Facades\Auth::user()->link_token])}}">Refresh Link</a>
                        </li>
                        <li class="nav-item m-1">
                            <form action="{{route('account.delete', ['token' => \Illuminate\Support\Facades\Auth::user()->link_token])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger">Delete Link</button>
                            </form>
                        </li>
                    </ul>
                    <div class="d-flex card">
                        <div class="card-header">
                            Account: {{\Illuminate\Support\Facades\Auth::user()->username}}
                            <p class="card-text"><small class="text-muted small">{{\Illuminate\Support\Facades\Auth::user()->date_link_token}}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    @yield('accountContent')
@endsection
