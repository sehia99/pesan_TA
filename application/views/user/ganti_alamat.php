<div class="container-fluid">
<?php echo $this->session->flashdata('pesan'); ?>
<div class="card">
<h5 class="card-header"><i class="fas fa-edit mb-3"></i>GANTI ALAMAT PENGIRIMAN</h5>
<div class="card-body">
<form action="<?php echo base_url().'user/pesanan/update_alamat' ?>" method="post">

    <div class="form-group">
    <input type="hidden" name="id" class="form-control" value="<?php echo $id_invoice->id; ?>">
    <label>Alamat Pengiriman baru</label>
    <input type="text" name="alamat" class="form-control">
    <?php echo form_error('nama', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    
    <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
</form>

</div>
</div>
</div>