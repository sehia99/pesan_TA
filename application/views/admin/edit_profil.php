<div class="container-fluid">
<?php echo $this->session->flashdata('pesan'); ?>
<div class="card">
<h5 class="card-header"><i class="fas fa-edit mb-3"></i>EDIT PROFIL</h5>
<div class="card-body">
<?php foreach($user as $user): ?>
<form action="<?php echo base_url().'admin/profil/update' ?>" method="post">

    <div class="form-group">
    <input type="hidden" name="id" class="form-control" value="<?php echo $user->id; ?>">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="<?php echo $user->nama; ?>">
    <?php echo form_error('nama', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    <!--<div class="form-group">
    <label>Username</label> -->
    <input type="hidden" name="username" class="form-control" value="<?php echo $user->username;?>">
    <?php echo form_error('username', '<div class="text-danger small ml-2">*','</div>') ?>
    <!--</div>-->
    <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo $user->email; ?>">
    <?php echo form_error('email', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    <div class="form-group">
    <label>No. Telephone</label>
    <input type="text" name="no_tlp" class="form-control" value="<?php echo $user->no_tlp; ?>">
    <?php echo form_error('no_tlp', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    <div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" value="<?php echo $user->alamat; ?>">
    <?php echo form_error('alamat', '<div class="text-danger small ml-2">*','</div>') ?>
    <!--<select name="prov" class="form-control" id="provinsi" >
                  <option value="<?php echo $user->prov ?>"><?php echo $user->nama_prov ?></option>
                  <?php 
                    foreach($provinsi as $prov)
                    {
                      echo '<option value="'.$prov->id.'">'.$prov->nama.'</option>';
                    }
                  ?>
                </select> -->
                <input type="hidden" name="prov" value="33">
                 <select name="kab" class="form-control" id="kabupaten" required>
                  <option value="<?php echo $user->kab ?>"><?php echo $user->nama_kab ?></option>
                  <?php 
                  foreach($kabupaten as $kab)
                    {
                      echo '<option value="'.$kab->id.'">'.$kab->nama.'</option>';
                    }
                   ?>
                </select>
                <select name="kec" class="form-control" id="kecamatan" required>
                <option value="<?php echo $user->kec ?>"><?php echo $user->nama_kec ?></option>
              </select>
              <select name="des" class="form-control" id="desa" required>
                <option value="<?php echo $user->des ?>"><?php echo $user->nama_des ?></option>
              </select> 
    <input type="hidden" name="role_id" class="form-control" value="<?php echo $user->role_id; ?>">
    </div>
    <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
</form>
<?php endforeach; ?>
</div>
</div>
</div>