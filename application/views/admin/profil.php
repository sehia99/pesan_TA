<div class="container-fluid">
<div class="card">
    <h5 class="card-header">Profil</h5>
    <div class="card-body">
    <?php foreach($user as $user) : ?>
        <div class="row">
            <div class="col-md-4"><img src="<?php echo base_url().'/uploads/'.$user->gambar ?>" class="card-img-top mb-2"><div class="file btn btn-sm btn-primary">Ganti Photo Profil<input type="file" name="gambar"/></div></div>
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
                <td><strong><?php echo $user->alamat ?></strong></td>
            </tr>
            </table>
            <?php echo anchor('admin/profil/edit/'.$user->id, '<div class="btn btn-primary btn-sm">Edit Profil</div>') ?>
            <?php echo anchor('admin/profil/ganti_password', '<div class="btn btn-danger btn-sm">Ganti Password</div>') ?>
            </div>
        </div>
<?php endforeach; ?>
    </div>
</div>
</div>

