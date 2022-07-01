<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Jalur<span> Mandiri</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Dashboard</li>
      <li class="nav-item">
        <a href="{{ route('user.dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item nav-category">Paket</li>
      <li class="nav-item">
        <a href="{{ route('user.paket') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Daftar Paket</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('user.invoice') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Invoice & Pembayaran</span>
        </a>
      </li>

      <li class="nav-item nav-category">Latihan</li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" href="#latihan" role="button" aria-expanded="false" aria-controls="latihan">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Latihan</span>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down link-arrow"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </a>
        <div class="collapse" id="latihan" style="">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ route('user.latihan') }}" class="nav-link">
                Latihan
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('user.latihan.hasil') }}" class="nav-link">
                Hasil Latihan
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item nav-category">Tryout</li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" href="#tryout" role="button" aria-expanded="false" aria-controls="tryout">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Tryout</span>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down link-arrow"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </a>
        <div class="collapse" id="tryout" style="">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ route('user.tryout') }}" class="nav-link">
                Tryout
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('user.tryout.hasil') }}" class="nav-link">
                Hasil Tryout
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item nav-category">Akun</li>
      <li class="nav-item">
        <a href="{{ route('user.profil') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Profil</span>
        </a>
      </li>

      <li class="nav-item nav-category">Logout</li>
      <li class="nav-item">
        <a href="#" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="link-icon" data-feather="log-out"></i>
          <span class="link-title">Logout</span>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </a>
      </li>
    </ul>
  </div>
</nav>