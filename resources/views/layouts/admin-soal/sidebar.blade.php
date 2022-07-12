<nav class="sidebar">
  <div class="sidebar-header">
    <a href="/" class="sidebar-brand">
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
      <li class="nav-item nav-category">Menu</li>
      <li class="nav-item">
        <a href="{{ route('admin-soal.dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item nav-category">Materi</li>
      <li class="nav-item">
        <a href="{{ route('admin-soal.materi.materi.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Materi</span>
        </a>
      </li>

      <li class="nav-item nav-category">Soal Latihan</li>
      <li class="nav-item">
        <a href="{{ route('admin-soal.latihan.soal.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Soal Latihan</span>
        </a>
      </li>

      <li class="nav-item nav-category">Soal Tryout</li>
      <li class="nav-item">
        <a href="{{ route('admin-soal.tryout.soal.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Soal Tryout</span>
        </a>
      </li>

      <li class="nav-item nav-category">Soal Event Tryout</li>
      <li class="nav-item">
        <a href="{{ route('admin-soal.event-tryout.soal.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Soal Event Tryout</span>
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