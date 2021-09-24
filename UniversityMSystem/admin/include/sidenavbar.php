<div class="" id="sidenavbody">
	<button type="button" class="p-1 btn" title="Menu" id="navbar_open">
		<div class="icon-bar"></div>
		<div class="icon-bar"></div>
		<div class="icon-bar"></div>
		<div class="icon-bar"></div>
	</button>
	<div class="bg-dark " id="sidenavbar">
		<a role="button" class="close text-white p-3" id="navbar_close">&times;</a>
		<h3 class="text-center">Menu</h3>
		<div id="nav_accodion">
			<ul class="nav flex-column pl-3 list-group">
				<div>
					<li class="nav-item pl-2 ">
						<a class="collapsed" data-toggle="collapse" data-target="#facMenu" data-parent="nav_accodion">
							<div class="d-flex justify-content-between">
								<div>Faculty</div>
								<div><i class="fas fa-plus px-2"></i></div>
							</div>
						</a>
					</li>
					<div class="collapse" id="facMenu">
						<ul type="none" class="text-left">
							<li><a class="pl-2" href="faculty_member_info.php">Member</a></li>
							<li><a class="pl-2" href="faculty_appontment_info.php">Appointment</a></li>
							<li><a class="pl-2" href="faculty_Retirement_info.php">Retirment</a></li>
							<li><a class="pl-2" href="faculty_housing_info.php">Housing</a></li>
							<li><a class="pl-2" href="faculty_development_info.php">Development</a></li>
							<li><a class="pl-2" href="faculty_helth_care.php">Helth Care</a></li>
						</ul>
					</div>
				</div>
				<div>
					<li class="nav-item pl-2">
						<a class="collapsed" data-toggle="collapse" data-target="#staffMenu" data-parent="nav_accodion">
							<div class="d-flex justify-content-between">
								<div>Staff</div>
								<div><i class="fas fa-plus px-2"></i></div>
							</div>
						</a>
					</li>

					<div class="collapse" id="staffMenu">
						<ul type="none" class="text-left">
							<li><a class="pl-2" href="staff_office_of_the_president.php">Office of President</a></li>
							<li><a class="pl-2" href="staff_office_of_the_provost.php">Office of the Provost</a></li>
							<li><a class="pl-2" href="staff_board_of_trustes.php">Board of Trustes</a></li>
							<li><a class="pl-2" href="administrative_policies.php">Administrative Policies</a></li>
							<li><a class="pl-2" href="staff_welcome_center.php">Staff Welcome Center</a></li>
						</ul>
					</div>
				</div>
				<div>
					<li class="nav-item pl-2">
						<a class="collapsed" data-toggle="collapse" data-target="#studentmenu" data-parent="nav_accodion">
							<div class="d-flex justify-content-between">
								<div>Student</div>
								<div><i class="fas fa-plus px-2"></i></div>
							</div>
						</a>
					</li>

					<div class="collapse" id="studentmenu">
						<ul type="none" class="text-left">
							<li><a class="pl-2" href="student_info.php">Student Infomation</a></li>
							<li><a class="pl-2" href="student_details.php">Student Details</a></li>
						</ul>
					</div>
				</div>
				<li class="nav-item pl-2"><a href="#"><i class="fas fa-plus px-2"></i>Item</a></li>
				<li class="nav-item pl-2"><a href="#"><i class="fas fa-plus px-2"></i>Item</a></li>
				<li class="nav-item pl-2"><a href="#"><i class="fas fa-plus px-2"></i>Item</a></li>
				<li class="nav-item pl-2"><a href="#"><i class="fas fa-plus px-2"></i>Item</a></li>
				<li class="nav-item pl-2"><a href="#"><i class="fas fa-plus px-2"></i>Item</a></li>
				<li class="nav-item pl-2"><a href="#"><i class="fas fa-plus px-2"></i>Item</a></li>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.collapse').on('shown.bs.collapse', function () {
			$(this).parent().find('.fa-plus').removeClass('fa-plus').addClass('fa-minus');
		}).on('hidden.bs.collapse', function(){
			$(this).parent().find('.fa-minus').removeClass('fa-minus').addClass('fa-plus');
		});
	});
</script>