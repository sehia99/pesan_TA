<div class="container-fluid">
<?php echo $this->session->flashdata('pesan'); ?>
<h5><i class="fas fa-edit mb-3"></i>KOMPLAIN</h5>
<form action="<?php echo base_url().'user/pesanan/kirim_komplain' ?>" method="post">
<div class="form-group">
    <label>Komplain anda</label>
    <input type="hidden" name="id" value="<?php echo $id_invoice->id ?>">
    <input type="text" name="komplain" class="form-control" required>
    <?php echo form_error('komplain', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
</form>

</div>