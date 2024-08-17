@extends('layout')

@section('content')
    <h1>delete reminder</h1>

    <div style="margin:20px">
        <label for="filter_subject">Filter by Subject:</label>
        <select name="filter_subject" id="filter_subject">
            <option value="">All</option>
            <option value="Ai">AI</option>
            <option value="Daa">DAA</option>
            <option value="Aos">AOS</option>
        </select>
        <br><br>
        <label for="filter_date">Filter by Date:</label>
        <input type="date" name="filter_date" id="filter_date">
        <br><br>
        <form action="delete" method="POST" >
            @csrf
            
        <label for="reminder_dropdown">Reminders:</label>
        <select name="reminder_dropdown" id="reminder_dropdown">
            <option value="">Select a reminder</option>
            @foreach($reminders as $reminder)
                <option value="{{$reminder->id}}"
                        data-description="{{$reminder->description}}"
                        data-email="{{$reminder->email}}"
                        data-contact="{{$reminder->contactNo}}"
                        data-sms="{{$reminder->smsNo}}"
                        data-reoccur="{{$reminder->reoccur}}">
                    {{$reminder->subject}} - {{$reminder->description}}
                </option>
            @endforeach
        </select>
        <br><br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" readonly></textarea>
        <br><br>
        <label for="email">Email:</label>
        <textarea name="email" id="email" readonly></textarea>
        <br><br>
        <label for="contact">Contact No:</label>
        <input type="text" name="contact" id="contact" readonly>
        <br><br>
        <label for="sms">SMS No:</label>
        <input type="text" name="sms" id="sms" readonly>
        <br><br>
        <label for="reoccur">Reoccur Frequency:</label>
        <input type="text" name="reoccur" id="reoccur" readonly>
        <br><br>
       
            <button type="submit">Delete</button>
        </form>
    </div>

    <script>
        function filterTable() {
            // Code for filtering the table
        }

        var reminderDropdown = document.getElementById('reminder_dropdown');
        var descriptionField = document.getElementById('description');
        var emailField = document.getElementById('email');
        var contactField = document.getElementById('contact');
        var smsField = document.getElementById('sms');
        var reoccurField = document.getElementById('reoccur');
        var deleteForm = document.getElementById('deleteForm');

        reminderDropdown.addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            descriptionField.value = selectedOption.getAttribute('data-description');
            emailField.value = selectedOption.getAttribute('data-email');
            contactField.value = selectedOption.getAttribute('data-contact');
            smsField.value = selectedOption.getAttribute('data-sms');
            reoccurField.value = selectedOption.getAttribute('data-reoccur');

        });

        document.getElementById('filter_subject').addEventListener('input', filterTable);
        document.getElementById('filter_date').addEventListener('input', filterTable);
    </script>
@endsection
