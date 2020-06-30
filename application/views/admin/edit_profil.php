<div class="container-fluid">
<h5><i class="fas fa-edit mb-3"></i>EDIT PROFIL</h5>
<?php foreach($user as $user): ?>
<form action="<?php echo base_url().'admin/profil/update' ?>" method="post">

    <div class="form-group">
    <input type="hidden" name="id" class="form-control" value="<?php echo $user->id; ?>">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="<?php echo $user->nama; ?>">
    </div>
    <div class="form-group">
    <label>Username</label>
    <input type="text" name="username" class="form-control" value="<?php echo $user->username;?>">
    </div>
    <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo $user->email; ?>">
    </div>
    <div class="form-group">
    <label>No. Telephone</label>
    <input type="text" name="no_tlp" class="form-control" value="<?php echo $user->no_tlp; ?>">
    </div>
    <div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" value="<?php echo $user->alamat; ?>">
    <input type="hidden" name="role_id" class="form-control" value="<?php echo $user->role_id; ?>">
    </div>
    <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
</form>
<?php endforeach; ?>
</div>