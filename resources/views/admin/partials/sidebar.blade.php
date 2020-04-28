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
					<a href="{{ route('admin.index') }}">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> Dashboard </span>
					</a>
				</li>

				<!--Reseller Menu-->
				<li class="@yield('user_menu_class')">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-desktop"></i>
						<span class="menu-text">
							Users
						</span>

						<b class="arrow fa fa-angle-down"></b>
					</a>

					<ul class="submenu">
						<li class="@yield('user_registration_menu_class')">
							<a href="{{ route('admin.users.create') }}">
								<i class="menu-icon fa fa-caret-right"></i>
								Add New User
							</a>
						</li>

						<li class="@yield('user_list_menu_class')">
							<a href="{{ route('admin.users.index') }}">
								<i class="menu-icon fa fa-caret-right"></i>
								User List
							</a>
						</li>
					</ul>
				</li>

				<!-- Virtual Number -->
				<li class="@yield('category_menu_class')">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-pencil-square-o"></i>
						<span class="menu-text"> Car Models </span>

						<b class="arrow fa fa-angle-down"></b>
					</a>

					<ul class="submenu">
						<li class="@yield('add_category_menu_class')">
							<a href="{{ route('admin.category.create') }}">
								<i class="menu-icon fa fa-caret-right"></i>
								Add New Model
							</a>
						</li>

						<li class="@yield('category_list_menu_class')">
							<a href="{{ route('admin.category.index') }}">
								<i class="menu-icon fa fa-caret-right"></i>
								Model List
							</a>
						</li>
					</ul>
				</li>

				<!--Sender Id-->
				<li class="@yield('car_menu_class')">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-pencil-square-o"></i>
						<span class="menu-text"> Cars </span>

						<b class="arrow fa fa-angle-down"></b>
					</a>

					<ul class="submenu">
						<li class="@yield('add_car_menu_class')">
							<a href="{{ route('admin.cars.create') }}">
								<i class="menu-icon fa fa-caret-right"></i>
								Add Car
							</a>
						</li>

						<li class="@yield('car_list_menu_class')">
							<a href="{{ route('admin.cars.index') }}">
								<i class="menu-icon fa fa-caret-right"></i>
								All Car List
							</a>
						</li>
					</ul>
				</li>

                <li class="@yield('car_menu_class')">
                    <a href="{{ route('admin.message.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                         Messages
                    </a>

                </li>
			</ul><!-- /.nav-list -->

			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>
		</div>
