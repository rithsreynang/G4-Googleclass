<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

</head>

<body>

	<div class="col-xl-12" style="margin-bottom: -70px;">
		<div class="card border rounded-3">
			<div class="container">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
	<!-- Js full calendar -->
	<script>
		let add = document.querySelector('.add');
		add.addEventListener('click', function() {
			$('#myModal').modal('toggle');
		})
		$(document).ready(function() {
			$('#calendar').fullCalendar({
				scrollTime: '07:00:00',
				minTime: '07:00:00',
				maxTime: '18:00:00',
				defaultView: 'agendaWeek',
				hiddenDays: [0],				
			});
		})
	</script>
</body>

</html>