<div class="container-fluid">
<h5><i class="fas fa-edit mb-3"></i>EDIT PASSWORD</h5>
<form action="<?php echo base_url().'admin/profil/ganti_password' ?>" method="post">
    <div class="form-group">
    <label>Password Baru</label>
    <input type="password" name="password_1" class="form-control">
    </div>
    <div class="form-group">
    <label>Ulangi Password Baru</label>
    <input type="password" name="password_2" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
</form>

</div>