<aside id="sidebar" class="position-sticky">
	<div class="position-fixed">
		<div class="custom-menu">
			<button type="button" id="sidebarCollapse" class="btn btn-primary">
			<i class="fa fa-bars"></i>
			<span class="sr-only">Toggle Menu</span>
			</button>
		</div>
		<div class="p-4 pt-5">
			<h1><a href="../dashboard" class="logo">Meeting <span class="d-block">TimeTable</span></a></h1>
			<ul class="list-unstyled components mb-5">
				<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
					<a href="{{ url('dashboard') }}">Dashboard</a>
				</li>
				<li class="{{ Request::is('staff/datastaff*') ? 'active' : '' }}">
					<a href="{{ url('staff/datastaff') }}">Staff</a>
				</li>
				<li class="{{ Request::is('klien/dataklien*') ? 'active' : '' }}">
					<a href="{{ url('klien/dataklien') }}">Klien</a>
				</li>
				<li class="{{ Request::is('aktivitas/dataaktivitas*') ? 'active' : '' }}">
					<a href="{{ url('aktivitas/dataaktivitas') }}">Aktivitas</a>
				</li>
				<li class="{{ Request::is('assignment/dataassignment*') ? 'active' : '' }}">
					<a href="{{ url('assignment/dataassignment') }}">Assignment</a>
				</li>
			</ul>
		</div>
	</div>
</aside>