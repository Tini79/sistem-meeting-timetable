<aside id="sidebar" class="position-relative">
	<div class="custom-menu">
		<button type="button" id="sidebarCollapse" class="btn btn-primary">
		<i class="fa fa-bars"></i>
		<span class="sr-only">Toggle Menu</span>
		</button>
	</div>
	<div class="p-4 pt-5">
	<h1><a href="index.html" class="logo">Meeting TimeTable</a></h1>
		<ul class="list-unstyled components mb-5">
			<li class="{{ Request::is('dashboard') ? 'active' : '' }}">
				<a href="{{ url('dashboard') }}">Dashboard</a>
			</li>
			<li class="{{ Request::is('staff/datastaff') ? 'active' : '' }}">
				<a href="{{ url('staff/datastaff') }}">Staff</a>
			</li>
			<li class="{{ Request::is('klien/dataklien') ? 'active' : '' }}">
				<a href="{{ url('klien/dataklien') }}">Klien</a>
			</li>
			<li class="{{ Request::is('aktivitas/dataaktivitas') ? 'active' : '' }}">
				<a href="{{ url('aktivitas/dataaktivitas') }}">Aktivitas</a>
			</li>
			<li class="{{ Request::is('assignment/dataassignment') ? 'active' : '' }}">
				<a href="{{ url('assignment/dataassignment') }}">Assignment</a>
			</li>
		</ul>
		<div class="footer">
			<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			<!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a> -->
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
		</div>
	</div>
</aside>