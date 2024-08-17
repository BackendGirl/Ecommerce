@extends('layout')

@section('content')

<p style="text-align:center">To modify you need to select reminder first</p>
<button style="margin-top: 10px;">
    <a href="{{ url('/viewreminder') }}">click to select reminder</a>
</button></br>
</p>
@endsection