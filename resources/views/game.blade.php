@extends('account')
@section('gameContent')
    <div class="container d-flex align-items-center justify-content-center" style="height: 50vh;">
        <div class="card" style="width: 30rem;">
            <div class="card-header @if($result === 'Win') bg-success @else bg-danger @endif">
                {{$result}}
            </div>
            <div class="card-body">
                <p class="card-text">@if($result === 'Win') Congratulations @else Sorry @endif, your @if($result === 'Win') lucky @else unlucky @endif number is {{$number}}</p>
                <h5 class="card-title" style="float: right">{{$prize}}$</h5>
                <a href="{{route('account.game', ['token' => \Illuminate\Support\Facades\Auth::user()->link_token])}}" class="btn btn-warning">Tray again</a>
            </div>
        </div>
    </div>
@endsection
