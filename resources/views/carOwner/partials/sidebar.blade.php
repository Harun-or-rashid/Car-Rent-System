		<div id="sidebar" class="sidebar responsive ace-save-state">
			<script type="text/javascript">
				try{ace.settings.loadState('sidebar')}catch(e){}
			</script>

			<div class="sidebar-shortcuts" id="sidebar-shortcuts">
				<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
					<button class="btn btn-success">
						<i class="ace-icon fa fa-signal"></i>
					</button>

					<button class="btn btn-info">
						<i class="ace-icon fa fa-pencil"></i>
					</button>

					<button class="btn btn-warning">
						<i class="ace-icon fa fa-users"></i>
					</button>

					<button class="btn btn-danger">
						<i class="ace-icon fa fa-cogs"></i>
					</button>
				</div>

				<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
					<span class="btn btn-success"></span>

					<span class="btn btn-info"></span>

					<span class="btn btn-warning"></span>

					<span class="btn btn-danger"></span>
				</div>
			</div><!-- /.sidebar-shortcuts -->

			<ul class="nav nav-list">
				<li class="@yield('dashboard_menu_class')">
					<a href="{{ route('carOwner.index') }}">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> Dashboard </span>
					</a>
				</li>

				<!-- Virtual Number -->
				<li class="@yield('car_menu_class')">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-pencil-square-o"></i>
						<span class="menu-text"> Cars </span>

						<b class="arrow fa fa-angle-down"></b>
					</a>

					<ul class="submenu">
						<li class="@yield('add_car_menu_class')">
							<a href="{{ route('carOwner.cars.create') }}">
								<i class="menu-icon fa fa-caret-right"></i>
								Add New Car
							</a>
						</li>

						<li class="@yield('car_list_menu_class')">
							<a href="{{ route('carOwner.cars.index') }}">
								<i class="menu-icon fa fa-caret-right"></i>
								My Car List
							</a>
						</li>
					</ul>
				</li>

                <!--Car Requests-->
                <li class="@yield('request_menu_class')">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-pencil-square-o"></i>
                        <span class="menu-text"> Requests </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li class="@yield('running_request_menu_class')">
                            <a href="{{ route('carOwner.car_request.running') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Running Rides
                            </a>
                        </li>

						<li class="@yield('pending_request_menu_class')">
							<a href="{{ route('carOwner.car_request.pending') }}">
								<i class="menu-icon fa fa-caret-right"></i>
								Pending Rides
							</a>
						</li>

						<li class="@yield('completed_request_menu_class')">
							<a href="{{ route('carOwner.car_request.completed') }}">
								<i class="menu-icon fa fa-caret-right"></i>
								Completed Rides
							</a>
						</li>

						<li class="@yield('canceled_request_menu_class')">
							<a href="{{ route('carOwner.car_request.canceled') }}">
								<i class="menu-icon fa fa-caret-right"></i>
								Canceled Rides
							</a>
						</li>

                        <li class="@yield('all_request_menu_class')">
                            <a href="{{ route('carOwner.car_request.index') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                All Requests
                            </a>
                        </li>
                    </ul>
                </li>
			</ul><!-- /.nav-list -->

			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>
		</div>
