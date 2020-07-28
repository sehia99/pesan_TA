<div class="container-fluid">
<?php echo $this->session->flashdata('pesan'); ?>
<div class="card">
<h5 class="card-header">TAMBAH USER</h5>
<div class="card-body">
<form class="user" method="post" action="<?php echo base_url('admin/user/proses_regis') ?>">
              <div class="form-group">
                  <input type="text" name="nama"class="form-control " id="exampleInputEmail" placeholder="Nama Lengkap Anda">
                  <?php echo form_error('nama', '<div class="text-danger small ml-2">*','</div>') ?>
                </div>
                <div class="form-group">
                  <input type="text" name="username" class="form-control " id="exampleInputEmail" placeholder="Username Anda">
                  <?php echo form_error('username', '<div class="text-danger small ml-2">*','</div>') ?>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control " id="exampleInputEmail" placeholder="Email Anda">
                  <?php echo form_error('email', '<div class="text-danger small ml-2">*','</div>') ?>
                </div>
                <div class="form-group">
                  <input type="number" name="no.tlp" class="form-control " id="exampleInputEmail" placeholder="No. Telephone Anda">
                  <?php echo form_error('no_tlp', '<div class="text-danger small ml-2">*','</div>') ?>
                </div>
                <div class="form-group">
                  <input type="text" name="alamat" class="form-control " id="exampleInputEmail" placeholder="Alamat Anda">
                  
                  <?php echo form_error('alamat', '<div class="text-danger small ml-2">*','</div>') ?>
                </div>
                <div class="form-group" >
                    <select  class="form-control" name="role_id" required>
                        <option disabled selected value>HAK AKSES</option>
                        <option value="1">Admin</option>
                        <option value="2">Pelanggan</option>
                    </select>
                </div>
                <div class="form-group">
                  <select name="prov" class="form-control" id="provinsi" required>
                  <option disabled selected value>- Select Provinsi -</option>
                  <?php 
                    foreach($provinsi as $prov)
                    {
                      echo '<option value="'.$prov->id.'">'.$prov->nama.'</option>';
                    }
                  ?>
                </select>     
                </div>
                <div class="form-group">

                            <select name="kab" class="form-control" id="kabupaten" required>
                  <option  disabled selected value>Select Kabupaten</option>
                </select>
                      
                </div>
                <div class="form-group">
                  <select name="kec" class="form-control" id="kecamatan" required>
                <option disabled selected value>Select Kecamatan</option>
              </select>
                        
                </div>
                <div class="form-group">
                  <select name="des" class="form-control" id="desa" required>
                <option disabled selected value>Select Desa</option>
              </select>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password_1" class="form-control " id="exampleInputPassword" placeholder="Password">
                    <?php echo form_error('password_1', '<div class="text-danger small ml-2">*','</div>') ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="password_2" class="form-control " id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div>
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit">Daftar</button>
              </form>

</div>
</div>
</div>