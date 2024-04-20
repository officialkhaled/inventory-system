<style>
    .breadcrumb {
        padding-top: 30px;
        padding-left: 10px;
        background-color: #fff;
    }

    .breadcrumb a:hover {
        text-decoration: none;
        color: #ff253a;
    }
</style>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
	
	<!-- Sidebar Toggle (Topbar) -->
	<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
		<i class="fa fa-bars"></i>
	</button>
	
	{{-- Breadcrumb --}}
	{{--@php
		$titles = [
			'dashboard' => 'Dashboard',
			'inventory' => 'Inventory List',
			'item' => 'Item List',
			'seller' => 'Seller List',
			'profile' => 'Profile',
			'edit' => 'Edit',
			'create' => 'Add',
		];
	@endphp
	
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			@php
				$segments = request()->segments();
				$url = '';
			@endphp
			@foreach($segments as $index => $segment)
				@php
					if (is_numeric($segment)) {
						continue;
					}
					$url .= '/' . $segment;
	
					if ($segment == 'admin' && !in_array('dashboard', $segments)) {
						$url .= '/dashboard';
					}
	
					$isLastSegment = $index == count($segments) - 1;
				@endphp
				<li class="breadcrumb-item {{ $isLastSegment ? 'active' : '' }}">
					@if (!$isLastSegment)
						<a href="{{ url($url) }}">{{ $breadcrumbNames[$segment] ?? ucfirst($segment) }}</a>
					@else
						{{ $breadcrumbNames[$segment] ?? ucfirst($segment) }}
					@endif
				</li>
			@endforeach
		</ol>
	</nav>--}}
	
	<!-- Topbar Navbar -->
	<ul class="navbar-nav ml-auto">
		<!-- Nav Item - User Information -->
		<li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
			   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $user->name }}</span>
				<img class="img-profile rounded-circle" src="{{ asset($user->img_path ?? 'adminPanel/img/undraw_profile.svg') }}">
			</a>
			<!-- Dropdown - User Information -->
			<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
				 aria-labelledby="userDropdown">
				<a class="dropdown-item" href="{{ route('admin.profile.edit') }}">
					<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
					Profile
				</a>
				<a class="dropdown-item" href="#">
					<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
					Settings
				</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
					Logout
				</a>
			</div>
		</li>
	
	</ul>

</nav>
