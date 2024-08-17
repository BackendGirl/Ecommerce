
@extends('layout')

@section('content')
<div style="margin:100px">
    <h3 style="text-align:center">Welcome to Reminder Application => {{$user[0]['name']}}!</h3>
    <div class="card-body" style="text-align:center">
        <p>Today is {{ date('l') }}, {{ date('j') }} of {{date('F')}}.</p>
    </div>
    <div style="text-align:center">
        <button style="margin-top: 10px;"><a href="{{ url('/setreminder') }}">Set Reminder</a></button></br>
        <button style="margin-top: 10px;"><a href="{{ url('/modify') }}">Modify Reminder</a></button></br>
        <button style="margin-top: 10px;"><a href="{{ url('/disable') }}">Disable Reminder</a></button></br>
        <button style="margin-top: 10px;"><a href="{{ url('/deletereminder') }}">Delete Reminder</a></button></br>
        <button style="margin-top: 10px;"><a href="{{ url('/viewreminder') }}">View Reminder</a></button></br>
    </div>

</div>
@endsection