@extends('account')
@section('accountContent')
    <table class="table border" style="width: 50rem; margin-left: 30px">
        <thead>
        <tr>
            <th scope="col" class="text-center">RESULT</th>
            <th scope="col" class="text-center">PRIZE</th>
            <th scope="col" class="text-center">NUMBER</th>
            <th scope="col" class="text-center">DATE</th>
        </tr>
        </thead>
        <tbody>
        @foreach($history as $item)
            <tr class="@if($item->result === 'Win') table-success @else table-danger @endif">
                <td class="text-center">{{$item->result}}</td>
                <td class="text-center">{{$item->amount}}</td>
                <td class="text-center">{{$item->number}}</td>
                <td class="text-center">{{$item->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
