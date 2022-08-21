<!-- Sidebar outter -->
<div class="main-sidebar"> 
    <!-- sidebar wrapper -->
    <aside id="sidebar-wrapper">
      <!-- sidebar brand -->
      <div class="sidebar-brand mt-3">
        <img src="/assets/img/logo.png" alt="" style="height: 70px">
        <h5>Politeknik Negeri Banyuwangi</h5>
      </div>
      <!-- sidebar menu -->

      {{-- Mahasiswa --}}
      @if(auth()->user()->role_id == 1)
      <ul class="sidebar-menu">
        <!-- menu header -->
        <li class="menu-header">Dashboard Mahasiswa</li>
        <!-- menu item -->
        <li class="nav-item">
          <a href="/dashboardM"><i class="fas  fa-address-card"></i><span>Dashboard</span></a>
          <a href="/form"><i class="fas fa-book"></i><span>Form Pendaftaran</span></a>
          <a href="/detail"><i class="fas fa-upload"></i><span>Form Submit</span></a>
          <a href="/riwayat"><i class="fas fa-history"></i><span>Riwayat Pendaftaran</span></a>
         
        </li>     
      </ul>  
      @endif
      {{-- Mahasiswa --}}

      {{-- Sekdir --}}
      @if(auth()->user()->role_id == 2)
      <ul class="sidebar-menu">
        <!-- menu header -->
        <li class="menu-header">Dashboard Sekertaris Direktur</li>
        <!-- menu item -->
        <li class=" nav-item">
          <a href="/dashboardS"><i class="fas  fa-address-card"></i><span>Dashboard</span></a>
          <a href="/persetujuans"><i class="fas fa-check-circle"></i><span>Persetujuan</span></a>
          <a href="/uploads"><i class="fab fa-accusoft"></i><span>Upload File <sub>undermaintanance</sub></span></a>
         
        </li>     
      </ul>  
      @endif
      {{-- Sekdir --}}
      
      {{-- Dosen --}}
      @if(auth()->user()->role_id == 3)
      <ul class="sidebar-menu">
        <!-- menu header -->
        <li class="menu-header">Dashboard Dosen</li>
        <!-- menu item -->
        <li class=" nav-item">
          <a href="/dashboardD"><i class="fas  fa-address-card"></i><span>Dashboard</span></a>
          <a href="/persetujuand"><i class="fas fa-check-circle"></i><span>Persetujuan</span></a>
          <a href="/pembataland"><i class="fas fa-ban"></i><span>Pembatalan</span></a>
         
        </li>     
      </ul>  
      @endif
      {{-- Dosen --}}

      {{-- Admin --}}
      @if(auth()->user()->role_id == 4)
      <ul class="sidebar-menu">
        <!-- menu header -->
        <li class="menu-header">Dashboard Admin</li>
        <!-- menu item -->
        <li class="nav-item">
          <a href="/dashboardA"><i class="fas fa-address-card"></i><span>Dashboard</span></a>
          <a href="/datasedangmengikuti"><i class="fas fad fa-user-graduate"></i><span>Data Mahasiswa Lomba</span></a>
          <a href="/dataselesailomba"><i class="fas fad fa-user-graduate"></i><span>Data Selesai Mahasiswa Lomba</span></a>
          <a href="/datasemua"><i class="fab fa-accusoft"></i><span>Data Semua</span></a>
         
        </li>     
      </ul>  
      @endif
      {{-- Admin --}}
     
     
      

   

       
    </aside>
  </div> 