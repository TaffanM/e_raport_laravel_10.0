<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link">
    <img src="/assets/dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Aplikasi E-Raport</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        @if(Session::get('kurikulum') == '2013')

        <!-- Kurikulum 2013 -->
        <li class="nav-header">RAPORT K-2013</li>
        <li class="nav-item">
          <a href="{{ route('kdk13.index') }}" class="nav-link">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>
              Data Kompetensi Dasar
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
              Rencana Penilaian
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview bg-secondary">
            <li class="nav-item">
              <a href="{{ route('rencanapengetahuan.index') }}" class="nav-link">
                <i class="fas fa-check-circle nav-icon"></i>
                <p>Nilai Pengetahuan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('rencanaketerampilan.index') }}" class="nav-link">
                <i class="fas fa-check-circle nav-icon"></i>
                <p>Nilai Keterampilan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-check-circle nav-icon"></i>
                <p>Pilih KD/Butir Spiritual </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-check-circle nav-icon"></i>
                <p>Pilih KD/Butir Sosial </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-check-circle nav-icon"></i>
                <p>Bobot PH PTS dan PAS </p>
              </a>
            </li>
          </ul>
        </li>

        <!-- End Kurikulum 2013 -->

        @elseif(Session::get('kurikulum') == '2006')

        <!-- Kurikulum 2006 -->
        <li class="nav-header">RAPORT KURIKULUM 2006</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list-ol"></i>
            <p>
              Mapping Mapel
            </p>
          </a>
        </li>
        <!-- End Kurikulum 2006 -->

        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>