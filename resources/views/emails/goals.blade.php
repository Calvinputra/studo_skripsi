<!DOCTYPE html>
<html>
<head>
    <title>Reminder Email</title>
</head>
<body>
    <h1>Reminder Email</h1>
    <p>Ini adalah pesan reminder untuk kelas {{ $goals->class_name }}</p>
    <p>Start date: {{ $goals->start_date }}</p>
    <p>End date: {{ $goals->end_date }}</p>
    <p>Notes: {{ $goals->notes }}</p>
</body>
</html>