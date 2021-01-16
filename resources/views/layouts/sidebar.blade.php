<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/surat" class="brand-link">
    <img src="{{ asset('lte/dist/img/STMIKLogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">STMIK Sumedang</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="/surat" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        @if (auth()->user()->role=="admin")
        <li class="nav-item">
          <a href="/buat" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Buat Jenis Surat
            </p>
          </a>
        </li>
        @endif
        @if (auth()->user()->role=="admin")
        <li class="nav-item">
          <a href="/jenis-surat" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Jenis Surat
            </p>
          </a>
        </li>
        @endif
        @if (auth()->user()->role=="admin")
        <li class="nav-item">
          <a href="/verifikasi" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Setujui Surat
            </p>
          </a>
        </li>
        @endif
        @if (auth()->user()->role=="mahasiswa")
        <li class="nav-item">
          <a href="/upload" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Upload File
            </p>
          </a>
        </li>
        @endif
        @if (auth()->user()->role=="wk")
        <li class="nav-item">
          <a href="/tanda-tangan" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Tanda Tangan
            </p>
          </a>
        </li>
        @endif
        @if (auth()->user()->role=="admin")
        <li class="nav-item">
          <a href="/arsip" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Arsip Surat
            </p>
          </a>
        </li>
        @endif
        @if (auth()->user()->role=="wk")
        <li class="nav-item">
          <a href="/uploadsrt" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Upload File
            </p>
          </a>
        </li>
        @endif
        @if (auth()->user()->role=="mahasiswa")
        <li class="nav-item">
          <a href="/download-surat/{{ auth()->id() }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Surat Disetujui
            </p>
          </a>
        </li>
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>