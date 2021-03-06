<div class="side-nav">
  <div class="side-nav-inner">
    <div class="side-nav-logo">
      <a href="index.html">
        <div class="logo logo-dark" style="background-image: url('<?php echo URL_IMG?>logo/logo.png')"></div>
        <div class="logo logo-white" style="background-image: url('<?php echo URL_IMG?>logo/logo-white.png')"></div>
      </a>
      <div class="mobile-toggle side-nav-toggle">
        <a href="">
          <i class="ti-arrow-circle-left"></i>
        </a>
      </div>
    </div>
    <ul class="side-nav-menu scrollable">
      <li class="nav-item active">
        <a href="<?php echo base_url()?>dashboard" class="mrg-top-30">
          <span class="icon-holder">
            <i class="ti-home"></i>
          </span>
          <span class="title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="ti-layout-media-overlay"></i>
          </span>
          <span class="title">Master</span>
          <span class="arrow">
            <i class="ti-angle-right"></i>
          </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="<?php echo base_url();?>master/akun">Akun</a>
          </li>
          <li>
            <a href="<?php echo base_url();?>master/unit">Unit/Cabang</a>
          </li>
          <!-- <li>
            <a href="<?php echo base_url();?>master/kelas">Kelas</a>
          </li> -->
          <li>
            <a href="<?php echo base_url();?>master/mapel">Mata Pelajaran</a>
          </li>
          <li>
            <a href="<?php echo base_url();?>master/jenjang">Jenjang</a>
          </li>
          <li>
            <a href="<?php echo base_url();?>master/tingkat_jenjang">Tingkat Jenjang</a>
          </li>
          <!-- <li>
            <a href="<?php echo base_url();?>master/guru">Guru</a>
          </li> -->
          <li class="nav-item dropdown">
            <a href="javascript:void(0);">
              <span>Sekolah (PG/TK/SD)</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo base_url()?>sekolah/siswa">Data Siswa</a>
              </li>
              <li>
                <a href="<?php echo base_url()?>sekolah/guru">Data Guru</a>
              </li>
              <!-- <li>
                <a href="<?php echo base_url()?>master/sekolah">Data Sekolah</a>
              </li>
              <li>
                <a href="<?php echo base_url()?>sekolah/kelas">Data Kelas</a>
              </li> -->
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="javascript:void(0);">
              <span>Privat</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo base_url()?>privat/siswa">Data Siswa</a>
              </li>
              <li>
                <a href="<?php echo base_url()?>privat/guru">Data Guru</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="javascript:void(0);">
              <span>Bimbel</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo base_url()?>bimbel/siswa">Data Siswa</a>
              </li>
              <li>
                <a href="<?php echo base_url()?>bimbel/guru">Data Guru</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="javascript:void(0);">
              <span>Batik</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo base_url()?>batik/siswa">Data Siswa</a>
              </li>
              <li>
                <a href="<?php echo base_url()?>batik/guru">Data Guru</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="javascript:void(0);">
              <span>Data Pendukung</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo base_url()?>master/provinsi">Provinsi</a>
              </li>
              <li>
                <a href="<?php echo base_url()?>master/kota">Kota/Kabupaten</a>
              </li>
              <li>
                <a href="<?php echo base_url()?>master/kecamatan">Kecamatan</a>
              </li>
              <li>
                <a href="<?php echo base_url()?>master/kelurahan">Kelurahan</a>
              </li>
              <li>
                <a href="master.html">Tahun Ajaran</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="ti-layout-media-overlay"></i>
          </span>
          <span class="title">Operasional</span>
          <span class="arrow">
            <i class="ti-angle-right"></i>
          </span>
        </a>
        <ul class="dropdown-menu">
          <!-- <li>
            <a href="<?php echo base_url();?>master/kelas">Kelas</a>
          </li> -->
          <li class="nav-item dropdown">
            <a href="javascript:void(0);">
              <span>Registrasi</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo base_url()?>sekolah/registrasi">Sekolah</a>
              </li>
              <li>
                <a href="<?php echo base_url()?>privat/registrasi">Privat</a>
              </li>
              <li>
                <a href="<?php echo base_url()?>bimbel/registrasi">Bimbel</a>
              </li>
              <li>
                <a href="<?php echo base_url()?>batik/registrasi">Batik</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>

      <!-- <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="ti-user"></i>
          </span>
          <span class="title">Registrasi</span>
          <span class="arrow">
            <i class="ti-angle-right"></i>
          </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="registrasi.html">Siswa Baru</a>
          </li>
          <li>
            <a href="registrasi.html">Guru Baru</a>
          </li>
          <li>
            <a href="registrasi.html">Bimbel Baru</a>
          </li>
        </ul>
      </li> -->
      
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="ti-time"></i>
          </span>
          <span class="title">Absensi</span>
          <span class="arrow">
            <i class="ti-angle-right"></i>
          </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="<?php echo base_url()?>absensi/guru">Absensi Guru</a>
          </li>
          <li class="nav-item dropdown">
            <a href="javascript:void(0);">
              <span>Absensi Siswa</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo base_url()?>privat/absensi_siswa">Privat</a>
              </li>
              <li>
                <a href="<?php echo base_url()?>bimbel/absensi_siswa">Bimbel</a>
              </li>
              <li>
                <a href="<?php echo base_url()?>bimbel/absensi_guru">Batik</a>
              </li>
            </ul>
          </li>   
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="ti-calendar"></i>
          </span>
          <span class="title">Jadwal</span>
          <span class="arrow">
            <i class="ti-angle-right"></i>
          </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="<?php echo base_url()?>sekolah/jadwal">PG/TK/SD (Kalender Akademik)</a>
          </li>
          <li>
            <a href="<?php echo base_url()?>bimbel/jadwal">Bimbel</a>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="ti-wallet"></i>
          </span>
          <span class="title">Pembayaran</span>
          <span class="arrow">
            <i class="ti-angle-right"></i>
          </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="cards.html">Data Invoice</a>
          </li>
          <li>
            <a href="cards.html">Metode Pembayaran</a>
          </li>
          <li>
            <a href="buttons.html">Member get Member</a>
          </li>
          
        </ul>
      </li>
      
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="ti-announcement"></i>
          </span>
          <span class="title">Informasi</span>
          <span class="arrow">
            <i class="ti-angle-right"></i>
          </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="<?php echo base_url()?>informasi">Informasi</a>
          </li>
          <li>
            <a href="<?php echo base_url()?>informasi/kategori">Kategori</a>
          </li>
          <li>
            <a href="<?php echo base_url()?>informasi/tag">Tags</a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="nvd3.html">
          <span class="icon-holder">
            <i class="ti-book"></i>
          </span>
          <span class="title">Materi</span>
        </a>
        
      </li>
      
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="ti-pie-chart"></i>
          </span>
          <span class="title">Laporan</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="ti-settings"></i>
          </span>
          <span class="title">Pengaturan</span>
        </a>
        
      </li>
    </ul>
  </div>
</div>