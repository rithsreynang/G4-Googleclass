<div class="col d-flex flex-wrap" style='margin-left:230px'>
	<div class="row row-cols-1 row-cols-md-3 g-4">
		<div class="col-4">
			<a href="#" style="text-decoration: none; color: black">
				<div class="card " style="width:260px;">
					<img class="card-image-top rounded-top" src="../../assets/images/courses/4by3/01.jpg" alt="...">
					<div class="card-body">
						<h5 class="card-title d-flex align-items-between">
							<span>Title</span>
						</h5>
						<?php
						require "database/database.php";
						require "models/classroom/get_user.model.php";
						require "models/classroom/select_classrooms.model.php";
						session_start();
						$email = $_SESSION['user'][2];
						$user_id = getUserID($email)['user_id'];
						$classroom = getClassrooms($user_id);
						print_r($classroom);
						?>
						<p class="card-text">Section</p>
						<p class="card-text">Room</p>
					</div>
				</div>
				<!-- <div class="card">
					<div class="card-body">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					</div>
					<div class="card-footer">
						<small class="text-muted">Last updated 3 mins ago</small>
					</div>
				</div> -->
		</div>
		</a>
	</div>
</div>
</div>
</div>
</div>

<!-- **************** MAIN CONTENT END **************** -->