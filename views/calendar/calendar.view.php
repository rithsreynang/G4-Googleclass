<html>

<head>
    <title> Assignment Dateline </title>
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <style>
        :root {
            --first-color: #16f;
            --second-color: #ff7;
        }
    </style>
</head>

<body>
    <div class="container-fluid d-flex flex-column align-items-around">
        <div class="pt-3">
            <button onclick="history.back()" class="btn bg-warning bg-opacity-10" data-bs-toggle="tooltip" data-bs-placement="top" title="Back to Classroom">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left-circle-fill text-warning" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                </svg>
            </button>
            <img src="../../assets/images/logo.svg" width="200px">
        </div>
        <div class="mt-3 ml-3 bg-white">
            <div id="calendar"​></div>
        </div>
    </div>
    <br>
</body>
</html>

<?php
session_start();
require_once "models/teach/assignment/get.user.assignment.php";
require_once "models/classroom/get.user.model.php";
$email = $_SESSION['user'][1];
$user_id = getUser($email)['user_id'];
$assignments = allAssignmentForEnrollStudent($user_id);
$s_to_json = json_encode((array)$assignments);

?>
<script src='fullcalendar/dist/index.global.js'></script>
<script type="text/javascript">
    var fromPHP = <?= $s_to_json ?>;
    let array = [];
    for (i = 0; i < fromPHP.length; i++) {
        let object = {
            title: fromPHP[i]['title'],
            start: fromPHP[i]['dateline'],
            end: fromPHP[i]['dateline'],
            description: fromPHP[i]['description']
        };
        array.push(object)
        console.log(array)
    }
</script>


<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            dayClick: function(date, allDay, jsEvent, view) {
                var formattedDate = date.toString().replace(" GMT+0000", "");
                alert(formattedDate);
            },
            allDaySlot: false,
            themeSystem: 'bootstrap',
            headerToolbar: false,
            contentHeight: 550,
            scrollTime: '07:00:00',
            defaultView: 'agendaWeek',
            schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
            header: {

                left: 'month, agendaWeek, agendaDay myCustomButton',
                center: 'title',
                right: 'prev today next ',
            },
            buttonText: {
                week: 'Week',
                today: 'Today',
                day: 'Day',
                month: 'Month',
                list: 'List',
            },
            events: array,
            eventColor: '#336AF2'
        });
    })
</script>