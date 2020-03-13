<?php $this->load->view('header'); ?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('menu_left');?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view('menu_top');?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>
          <p class="mb-4">Data Karyawan</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Karyawan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <a href="<?php echo site_url('tabel/tambah');?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</a>
                <br/><br/>
                <?php
				#print_r($model->rows);
				?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Stok</th>
                      <th>Aksi</th>
                     </tr>
                  </thead>
                  
                  <tbody>
                     <?php 
  $no = 0;
  foreach($model->rows as $row){ 
  	$no++;
	#print_r($row); 
	  ?>
  	<tr>
      <td><?php echo $no;?></td>
      <td><?php echo $row->kode;?></td>
      <td><?php echo $row->nama;?></td>
      <td><?php echo $row->harga;?></td>
      <td><?php echo $row->stok;?></td>
      <td>
       <a href="<?php echo site_url('tabel/edit/'.$row->kode);?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>  
       <a href="<?php echo site_url('tabel/hapus/'.$row->kode);?>" class="btn btn-sm btn-danger" onClick="return confirm('Yakin akan dihapus?')"> <i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
      </td>
 	</tr>
  <?php
  }
  ?>
                  </tbody>
                  
                  
                  
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
 <?php $this->load->view('footer');?>