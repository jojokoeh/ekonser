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
          
          <h3 class="mb-4">Form <?php echo isset($model->row->kode) ? 'Ubah' : 'Tambah';?> Data</h3>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Barang</h6>
            </div>
            <div class="card-body">
             <div class="form-group row">
<?php
if(isset($model->row->kode)){ //edit
	$kode_hidden = '<input type="hidden" name="h_kode" id="h_kode" value="'.$model->row->kode.'">';
	$kode_disable = ' disabled ';
	$action = site_url('tabel/ubah');
}else{ //tambah
	$kode_hidden = '';
	$kode_disable = '';
	$action = site_url('tabel/tambah');
}
?>

<form action="<?php echo $action?>" method="post" class="form-horizontal">

 <div class="form-group row">
     <label class="control-label col-sm-5" for="kode"><?php echo $model->labels['kode'];?></label>
     <div class="col-sm-7">
        <input type="text" name="kode" id="kode" class="form-control" value="<?php echo @$model->row->kode?>" size="10" <?php echo $kode_disable?>    />
     </div>
 </div>
 
 <div class="form-group row">
      <label class="control-label col-sm-5" for="jenjang_studi"><?php echo $model->labels['nama'];?></label>
      <div class="col-sm-7">
        <input type="text" name="nama" id="nama" value="<?php echo @$model->row->nama?>"  class="form-control "  />
      </div>
  </div>
  
 
 <div class="form-group row">
  <label class="control-label col-sm-5" for="nama">
 <?php echo $model->labels['harga'];?> </label>
 <div class="col-sm-7">
 <input type="text" name="harga" id="harga" value="<?php echo @$model->row->harga?>" class="form-control "  />
 </div>
 </div>
 
 <div class="form-group row">
  <label class="control-label col-sm-5" for="nama">
 <?php echo $model->labels['stok'];?> </label>
 <div class="col-sm-7">
 <input type="number" name="stok" id="stok" value="<?php echo @$model->row->stok?>"  class="form-control "  />
 </div>
 </div>
 
 <div class="form-group row">
  <label class="control-label col-sm-5" for="nama">&nbsp;</label>
  <div class="col-sm-7">
 <?php echo $kode_hidden?>
 <input type="submit" name="btnSubmit" id="btnSubmit" value="Simpan" class="btn btn-primary btn-block" />
 </div>
</div>
</form>
             </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
 <?php $this->load->view('footer');?>