
@extends('layout')

@section('content')
<fieldset style="margin-left:200px;margin-right:200px;">
<legend>Form:</legend>
<form action="/loginsubmit" method="POST">
    @csrf
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password" id="pwd">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</fieldset>
@endsection