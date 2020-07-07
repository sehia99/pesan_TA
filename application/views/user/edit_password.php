<div class="container-fluid">
<?php echo $this->session->flashdata('pesan'); ?>
<h5><i class="fas fa-edit mb-3"></i>EDIT PASSWORD</h5>
<form action="<?php echo base_url().'user/profil/ganti_password' ?>" method="post">
<div class="form-group">
    <label>Password Lama</label>
    <input type="password" name="old_password" class="form-control">
    <?php echo form_error('old_password', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    <div class="form-group">
    <label>Password Baru</label>
    <input type="password" name="password_1" class="form-control">
    <?php echo form_error('password_1', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    <div class="form-group">
    <label>Ulangi Password Baru</label>
    <input type="password" name="password_2" class="form-control">
    <?php echo form_error('password_2', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
</form>

</div>