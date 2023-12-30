@extends('welcome')
@section('content')
    <div class="m-3">
        <div class="card">
            <div class="card-header">
                Success
            </div>
            <div class="card-body">
                <h5 class="card-title">Your account link here below</h5>
                <p class="card-text">Save this link for access to your account</p>
                <a href="{{$url}}">{{$url}}</a>
            </div>
        </div>
    </div>
@endsection
