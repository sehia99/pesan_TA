<div class="container-fluid">
<?php echo $this->session->flashdata('pesan'); ?>
<div class="card">
<h5 class="card-header">TAMBAH REKENING</h5>
<div class="card-body">
<form id="tambah_makmin_form" action="<?php echo base_url().'admin/rekening/tambah_aksi';  ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
        <?php echo form_error('nama', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    <div class="form-group">
        <label>Nama Bank</label>
        <input type="text" name="nama_bank" class="form-control" required>
        <?php echo form_error('nama_bank', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    <div class="form-group">
        <label>No. Rekening</label>
        <input type="text" name="no_rekening" class="form-control" required>
        <?php echo form_error('no_rekening', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
     <a href="<?php echo base_url('admin/rekening/index'); ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
     <button type="submit" class="btn btn-primary" >Save</button>
    </form>
</div>
</div>
</div>