<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">RESSET PASSWORD</h1>
              </div>
              <?php echo $this->session->flashdata('pesan'); ?>
              <form class="user" method="post" action="<?php echo base_url('auth/resset_password_validation') ?>">
              <div class="form-group">
                  <input type="email" name="email"class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Anda">
                  <?php echo form_error('email', '<div class="text-danger small ml-2">*','</div>') ?>
                </div>
                
                <button class="btn btn-primary btn-user btn-block" type="submit">Resset Password</button>
              </form>
              <hr>
              
              <div class="text-center">
                <a class="small" href="<?php echo base_url('auth/login'); ?>">Login!</a>
                
              </div>
              <div class="text-center">
              <a class="small" href="<?php echo base_url('registrasi/index'); ?>">Daftar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</body>