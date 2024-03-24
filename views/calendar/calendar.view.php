<html>

<head>
    <title> Assignment Dateline </title>
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
</head>

<body>
    <div class="container-fluid d-flex">
        <div>
            <button onclick="history.back()" class="btn btn-primary">Back to classroom </button>
        </div>
        <div class="main">
            <div id="calendar" ​></div>
        </div>
    </div>
    <br>
</body>

</html>
<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            dayClick: function(date, allDay, jsEvent, view) {
                var formattedDate = date.toString().replace(" GMT+0000", "");
                alert(formattedDate);
            },
            scrollTime: '07:00:00',
            defaultView: 'agendaWeek',
            header: {
                left: ' prev',
                center: 'title',
                right: ' next',
            },
            buttonText: {
                week: 'Week',
                today: 'Today',
                day: 'Day',
                month: 'Month',
                list: 'List',
            },
        });
    })
</script>