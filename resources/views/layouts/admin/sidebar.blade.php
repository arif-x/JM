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
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item nav-category">Konfigurasi Umum</li>
      <li class="nav-item">
        <a href="{{ route('admin.admin-soal.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Admin Soal</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.kontak.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Kontak</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.rekening.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Rekening</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.paket.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Paket</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.kategori.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Kategori</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.jenis-soal.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Jenis Soal</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.sub-jenis-soal.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Sub Jenis Soal</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.jenis-kampus.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Jenis Universitas</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.universitas.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Universitas</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.tim.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Tim</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.kebijakan.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Kebijakan</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.slider-besar.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Slider Besar</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.slider-kecil.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Slider Kecil</span>
        </a>
      </li>

      <li class="nav-item nav-category">Konfigurasi Materi</li>
      <li class="nav-item">
        <a href="{{ route('admin.materi.label-materi.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Label Materi</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.materi.materi.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Materi</span>
        </a>
      </li>

      <li class="nav-item nav-category">Konfigurasi Latihan</li>
      <li class="nav-item">
        <a href="{{ route('admin.latihan.label-soal.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Label Soal Latihan</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.latihan.soal.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Soal Latihan</span>
        </a>
      </li>

      <li class="nav-item nav-category">Konfigurasi Tryout</li>
      <li class="nav-item">
        <a href="{{ route('admin.tryout.label-soal.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Label Soal Tryout</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.tryout.soal.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Soal Tryout</span>
        </a>
      </li>

      <li class="nav-item nav-category">Konfigurasi Event Tryout</li>
      <li class="nav-item">
        <a href="{{ route('admin.event-tryout.label-soal.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Label Soal Event Tryout</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.event-tryout.soal.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Soal Event Tryout</span>
        </a>
      </li>

      <li class="nav-item nav-category">Pembayaran</li>
      <li class="nav-item">
        <a href="{{ route('admin.pembayaran.index') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Data Pembayaran</span>
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