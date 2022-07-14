<nav class="navbar" style="z-index: 1000;">
	<a href="#" class="sidebar-toggler">
		<i data-feather="menu"></i>
	</a>
	<div class="navbar-content">
		<ul class="navbar-nav">
			<li class="nav-item dropdown nav-profile">
				<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					@guest
					@if (Route::has('login'))
					@endif
					@if (Route::has('register'))
					@endif
					@else
					@php echo Auth::user()->avatar; @endphp
					@endguest
				</a>
				<div class="dropdown-menu" aria-labelledby="profileDropdown">
					<div class="dropdown-header d-flex flex-column align-items-center">
						<div class="figure mb-3">
							@guest
							@if (Route::has('login'))
							@endif
							@if (Route::has('register'))
							@endif
							@else
							@php echo Auth::user()->avatar; @endphp
							@endguest
						</div>
						<div class="info text-center">
							<p class="name font-weight-bold mb-0">
								@guest
								@if (Route::has('login'))
								@endif
								@if (Route::has('register'))
								@endif
								@else
								{{ Auth::user()->nama_lengkap }}
								@endguest
							</p>
							<p class="email text-muted mb-3">
								@guest
								@if (Route::has('login'))
								@endif
								@if (Route::has('register'))
								@endif
								@else
								{{ Auth::user()->email }}
								@endguest
							</p>
						</div>
					</div>
					<div class="dropdown-body">
						<ul class="profile-nav p-0 pt-3">
							<li class="nav-item">
								<a href="javascript:;" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
									<i data-feather="log-out"></i>
									<span>Log Out</span>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</li>
		</ul>
	</div>
</nav>