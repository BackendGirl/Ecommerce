@extends('layout')

@section('content')

<fieldset style="text-align:center;padding:20px">
<h1>Modify Reminder</h1>
<form action="/update_reminder" method="post">
    @csrf

    <input type="hidden" name="reminder_id" value="{{$reminder->id}}">
    </br></br>  
    <label for="subject">Subject:</label>
    <input type="text" name="subject" id="subject" value="{{$reminder->subject}}">
    </br></br>
    <label for="date">Date:</label>
    <input type="date" name="date" id="date" value="{{$reminder->date}}">
    </br></br>
    <label for="description">Description:</label>
    <textarea name="description" id="description">{{$reminder->description}}</textarea>
    </br></br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="{{$reminder->email}}">
    </br></br>
    <label for="contactNo">Contact No:</label>
    <input type="tel" name="contactNo" id="contactNo" value="{{$reminder->contactNo}}">
    </br></br>
    <label for="smsNo">SMS No:</label>
    <input type="tel" name="smsNo" id="smsNo" value="{{$reminder->smsNo}}">
    </br></br>
    <label for="reoccur">Reoccur Frequency:</label>
    <input type="text" name="reoccur" id="reoccur" value="{{$reminder->reoccur}}">
    <br><br>
    <button type="submit">Modify Reminder</button>
</form>
</fieldset>

@endsection
