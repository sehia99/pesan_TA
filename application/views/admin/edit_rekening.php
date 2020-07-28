<div class="container-fluid">
<?php echo $this->session->flashdata('pesan'); ?>
<div class="card">
<h5 class="card-header">EDIT REKENING</h5>
<div class="card-body">
<?php foreach($rek as $rek): ?>
<form id="tambah_makmin_form" action="<?php echo base_url().'/admin/rekening/update';  ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type="hidden" name="id" value="<?php echo $rek->id ?>">
        <input type="text" name="nama" class="form-control" value="<?php echo $rek->nama ?>" required>
        <?php echo form_error('nama', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    <div class="form-group">
        <label>Nama Bank</label>
        <input type="text" name="nama_bank" class="form-control" value="<?php echo $rek->nama_bank ?>" required>
        <?php echo form_error('nama_bank', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    <div class="form-group">
        <label>No. Rekening</label>
        <input type="text" name="no_rekening" class="form-control" value="<?php echo $rek->no_rekening ?>" required>
        <?php echo form_error('no_rekening', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
     <a href="<?php echo base_url('admin/rekening/index'); ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
     <button type="submit" class="btn btn-primary" >Save</button>
    </form>
<?php endforeach; ?>
</div>
</div>
</div>