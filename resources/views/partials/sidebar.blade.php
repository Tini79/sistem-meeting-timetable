<aside id="sidebar">
	<div class="position-fixed">
	<div class="inner-sidebar">
		<div class="custom-menu">
			<button type="button" id="sidebarCollapse" class="btn btn-primary">
			<i class="fa fa-bars"></i>
			<span class="sr-only">Toggle Menu</span>
			</button>
		</div>
		<div class="p-4">
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
				<li class="{{ Request::is('laporan*') ? 'active' : '' }}">
					<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Laporan</a>
					<ul class="collapse list-unstyled" id="homeSubmenu">
						<li class="{{ Request::is('laporan/staff*') ? 'active' : '' }}">
							<a href="/laporan/staff">Laporan Staff</a>
						</li>
						<li class="{{ Request::is('laporan/klien*') ? 'active' : '' }}">
							<a href="/laporan/klien">Laporan Klien</a>
						</li>
						<li class="{{ Request::is('laporan/aktivitas*') ? 'active' : '' }}">
							<a href="/laporan/aktivitas">Laporan Aktivitas</a>
						</li>
						<li class="{{ Request::is('laporan/assignment*') ? 'active' : '' }}">
							<a href="/laporan/assignment">Laporan Assignment</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</aside>
