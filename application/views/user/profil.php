<div class="container-fluid">
<?php echo $this->session->flashdata('pesan'); ?>
<div class="card">
    <h5 class="card-header">Profil</h5>
    <div class="card-body">
    <?php foreach($user as $user) : ?>
        <div class="row">
            <div class="col-md-4"><a href="<?php echo base_url().'/uploads/'.$user->gambar ?>"><img src="<?php echo base_url().'/uploads/'.$user->gambar ?>" class="card-img-top mb-2 img-fluid"> </a>
            <form action="<?php echo base_url('user/profil/edit_photo') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label>Ganti Photo Profil</label>
            <input type="file" name="gambar">
            <button class="btn btn-sm btn-primary mt-2" type="submit">Simpan</button>
            </div>
            </form>
            </div>
            <div class="col-md-8">
            <table class="table">
            <tr>
                <td>Nama</td>
                <td><strong><?php echo $user->nama ?></strong></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><strong><?php echo $user->username ?></strong></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><strong><?php echo $user->email ?></strong></td>
            </tr>
            <tr>
                <td>No. Telephone</td>
                <td><strong><?php echo $user->no_tlp ?></strong></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><strong><?php echo $user->alamat,', ', $user->nama_prov,', ', $user->nama_kab,', ', $user->nama_kec,', ', $user->nama_des ?></strong></td>
            </tr>
            </table>
            <?php echo anchor('user/profil/edit/'.$user->id, '<div class="btn btn-primary btn-sm">Edit Profil</div>') ?>
            <?php echo anchor('user/profil/ganti_password', '<div class="btn btn-danger btn-sm">Ganti Password</div>') ?>
            </div>
        </div>
<?php endforeach; ?>
    </div>
</div>
</div>

