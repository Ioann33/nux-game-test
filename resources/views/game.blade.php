@extends('account')
@section('gameContent')
    <div class="container d-flex align-items-center justify-content-center" style="height: 50vh;">
        <div class="card" style="width: 30rem;">
            <div class="card-header bg-success">
                Win
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="{{route('account.game', ['token' => \Illuminate\Support\Facades\Auth::user()->link_token])}}" class="btn btn-warning">Tray again</a>
            </div>
        </div>
    </div>
@endsection
