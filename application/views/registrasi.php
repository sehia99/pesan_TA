<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">PENDAFTARAN AKUN</h1>
              </div>
              <form class="user" method="post" action="<?php echo base_url('registrasi/index') ?>">
              <div class="form-group">
                  <input type="text" name="nama"class="form-control form-control-user" id="exampleInputEmail" placeholder="Nama Lengkap Anda">
                  <?php echo form_error('nama', '<div class="text-danger small ml-2">*','</div>') ?>
                </div>
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username Anda">
                  <?php echo form_error('username', '<div class="text-danger small ml-2">*','</div>') ?>
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Anda">
                  <?php echo form_error('email', '<div class="text-danger small ml-2">*','</div>') ?>
                </div>
                <div class="form-group">
                  <input type="number" name="no.tlp" class="form-control form-control-user" id="exampleInputEmail" placeholder="No. Telephone Anda">
                  <?php echo form_error('no_tlp', '<div class="text-danger small ml-2">*','</div>') ?>
                </div>
                <div class="form-group">
                  <input type="text" name="alamat" class="form-control form-control-user" id="exampleInputEmail" placeholder="Alamat Anda">
                  
                  <?php echo form_error('alamat', '<div class="text-danger small ml-2">*','</div>') ?>
                </div>
                <!--<div class="form-group">
                  <select name="prov" class="form-control" id="provinsi" required type="hidden">
                  <option disabled selected value>- Select Provinsi -</option>
                  <?php 
                    foreach($provinsi as $prov)
                    {
                      echo '<option value="'.$prov->id.'">'.$prov->nama.'</option>';
                    }
                  ?>
                </select>     
                </div> -->
                <input type="hidden" name="prov" value="33">
                <div class="form-group">

                            <select name="kab" class="form-control" id="kabupaten" required>
                  <option  disabled selected value>Select Kabupaten</option>
                  <?php 
                    foreach($kabupaten as $kab)
                    {
                      echo '<option value="'.$kab->id.'">'.$kab->nama.'</option>';
                    }
                  ?>
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
                    <input type="password" name="password_1" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    <?php echo form_error('password_1', '<div class="text-danger small ml-2">*','</div>') ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="password_2" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div>
                  <input type="hidden" name="role_id" value="2">
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit">Daftar</button>
              </form>
              <hr>
              
              <div class="text-center">
                <a class="small" href="<?php echo base_url('auth/login'); ?>">Sudah Punya Akun? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</body>