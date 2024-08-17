@extends('layout')

@section('content')


<h1 style="text-align:center">set a new reminder</h1>
        <form method="post" action="newreminder" style="text-align:center;padding:20px">
        @csrf
            date<input type="date" name="date" id="date" required>
            <br><br>
            subject<select name="subject">
                    <option value="Ai">AI</option>
                    <option value="Daa">DAA</option>
                    <option value="Aos">AOS</option>
                    </select>
            <br><br>
            description<input type="text" name="description" id="description" required>
            <br><br>
            email<input type="email" name="email" id="email" value= "{{$user[0]['email']}}" required>
            <br><br>
            contactNo<input type="text" name="contactNo" id="contactNo" required>
            <br><br>
            smsNo<input type="text" name="smsNo" id="smsNo" required>
            <br><br>
            reoccur for next: 
                <input type="checkbox" name="reoccur" value="7days">7days   
                <input type="checkbox" name="reoccur" value="5days">5days   
                <input type="checkbox" name="reoccur" value="3days">3days   
                <input type="checkbox" name="reoccur" value="2days">2days   
            <br>
            <input type="submit" name="submit" value="confirm">
        </form>

@endsection