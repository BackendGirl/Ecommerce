@extends('layout')

@section('content')

<style>
    table {
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
    }
</style>

<h1>view your reminders</h1>

<div style="margin:20px">
    <label for="filter_subject">Filter by Subject:</label>
    <select name="filter_subject" id="filter_subject">
        <option value="">All</option>
        <option value="Ai">AI</option>
        <option value="Daa">DAA</option>
        <option value="Aos">AOS</option>
    </select>

    <label for="filter_date">Filter by Date:</label>
    <input type="date" name="filter_date" id="filter_date">

    <table id="reminder-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Email</th>
                <th>ContactNo</th>
                <th>SmsNo</th>
                <th>Reoccur Frequency</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reminders as $reminder)
            <tr>
                <td>{{$reminder->id}}</td>
                <td>{{$reminder->date}}</td>
                <td>{{$reminder->subject}}</td>
                <td>{{$reminder->description}}</td>
                <td>{{$reminder->email}}</td>
                <td>{{$reminder->contactNo}}</td>
                <td>{{$reminder->smsNo}}</td>
                <td>{{$reminder->reoccur}}</td>
                <td>
                    <button onclick="openModifyPage({{$reminder->id}})">Modify</button>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function filterTable() {
        var filterSubject = document.getElementById('filter_subject').value.toLowerCase();
        var filterDate = document.getElementById('filter_date').value;

        var table = document.getElementById('reminder-table');
        var rows = table.getElementsByTagName('tr');

        for (var i = 1; i < rows.length; i++) {
            var row = rows[i];
            var subject = row.getElementsByTagName('td')[3].textContent.toLowerCase();
            var date = row.getElementsByTagName('td')[2].textContent;

            if (subject.indexOf(filterSubject) > -1 && (filterDate === '' || filterDate === date)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    }

    function openModifyPage(reminderId) {
        window.location.href = '/modify/' + reminderId;
    }

    document.getElementById('filter_subject').addEventListener('input', filterTable);
    document.getElementById('filter_date').addEventListener('input', filterTable);
</script>

@endsection
