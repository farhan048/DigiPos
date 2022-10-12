<aside class="main-sidebar sidebar-ligth-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DigiPosyandu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          
        </div>
        <div class="info">
          <a href="#" class="d-block">Nama Buat Profile</a>
        </div>
        <div class="info d-flex ml-auto">
          <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="d-block text-danger"><i class="fas fa-sign-out-alt"></i></a>
      </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="pages/kanban.html" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Pelayanan</li>
          <li class="nav-item">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-weight"></i>
                <p>
                  Gizi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/mailbox/mailbox.html" class="nav-link">
                    <i class="fas fa-file-medical nav-icon"></i>
                    <p>Data Pemeriksaan Gizi</p>
                  </a>
                </li>
                {{-- <li class="nav-item">
                  <a href="pages/mailbox/compose.html" class="nav-link">
                    <i class="fas fa-history nav-icon"></i>
                    <p>Riwayat</p>
                  </a>
                </li> --}}
              </ul>
            </li>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-syringe"></i>
              <p>
                Imunisasi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="fas fa-notes-medical nav-icon"></i>
                  <p>Data Imunisasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fas fa-list-alt nav-icon"></i>
                  <p>Jenis Imunisasi</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fas fa-history nav-icon"></i>
                  <p>Riwayat</p>
                </a>
              </li> --}}
            </ul>
          </li>
          <li class="nav-header">Data Master</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clinic-medical"></i>
              <p>
                Fasilitas Kesehatan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('puskesmas')}}" class="nav-link">
                  <i class="fas fa-building nav-icon"></i>
                  <p>Puskesmas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('posyandu')}}" class="nav-link">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Posyandu</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-globe-asia"></i>
              <p>
                Data Wilayah
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('kecamatan')}}" class="nav-link">
                  <i class="nav-icon fas fa-map nav-icon"></i>
                  <p>Kecamatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('desa')}}" class="nav-link">
                  <i class="fas fa-map-marker-alt nav-icon"></i>
                  <p>Desa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Akun Pengguna
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('pimpinan')}}" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Akun Pimpinan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('uptd')}}" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Akun UPTD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('bidan')}}" class="nav-link">
                  <i class="fas fa-user-md nav-icon"></i>
                  <p>Akun Bidan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Akun Puskesmas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Akun Kader</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-child"></i>
              <p>
                Pasien
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('pasien')}}" class="nav-link">
                  <i class="fas fa-id-card nav-icon"></i>
                  <p>Data Pasien</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fas fa-file-alt nav-icon"></i>
                  <p>Data Keluarga</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>