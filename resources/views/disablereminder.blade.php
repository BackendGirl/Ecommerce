@extends('layout')

@section('content')
    <h1>disable reminder</h1>

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
        <label for="reminder_dropdown">Reminders:</label>
        <select name="reminder_dropdown" id="reminder_dropdown">
            @foreach($reminders as $reminder)
                <option value="{{$reminder->subject}}" data-description="{{$reminder->description}}">{{$reminder->subject}} - {{$reminder->description}}</option>
            @endforeach
        </select>
        <br><br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" readonly></textarea>
        <br><br>
        <button style="margin-top: 10px;"><a href="{{ url('/confirm') }}">Confirm</a></button></br>
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

        var reminderDropdown = document.getElementById('reminder_dropdown');
        var descriptionField = document.getElementById('description');

        reminderDropdown.addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            descriptionField.value = selectedOption.getAttribute('data-description');
        });

        document.getElementById('filter_subject').addEventListener('input', filterTable);
        document.getElementById('filter_date').addEventListener('input', filterTable);
    </script>

@endsection
