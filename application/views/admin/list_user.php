<div class="container-fluid">
<?php echo $this->session->flashdata('pesan'); ?>
<div class="card">
<h5 class="card-header">DATA USER</h3>
<div class="card-body">
<a href="<?php echo base_url('admin/user/tambah') ?>"><button class="btn btn-sm btn-primary mb-3" ><i class="fas fa-plus fa-sm"></i> Tambah User</button></a>

<table class="table table-bordered table-hover table-striped">

    <tr>
      
        <th>NAMA</th>
        <th>USERNAME</th>
        <th>EMAIL</th>
        <th>NO. HP</th>
        <th>ALAMAT</th>
        <th>Status</th>
        <!--<th colspan="3">AKSI</th>-->
    </tr>
    <?php foreach($user as $user) : ?>
    <tr>
    
    <td><?php echo $user->nama ?></td>
    <td><?php echo $user->username ?></td>
    <td><?php echo $user->email ?></td>
    <td><?php echo $user->no_tlp ?></td>
    <td><?php echo $user->alamat,', ',$user->nama_prov,', ',$user->nama_kab,', ',$user->nama_kec,', ',$user->nama_des ?></td>
    <?php if($user->role_id == '1'){ ?>
    <td>Admin</td>
    <?php }else{ ?>
    <td>User</td> <?php };?>
    <!--<td><?php echo anchor('admin/user/detail_user/'.$user->id,'<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?></td>
    <td><?php echo anchor('admin/user/edit/'.$user->id,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
    <td><?php echo anchor('admin/user/hapus/'.$user->id,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>-->
    <?php endforeach; ?>
    </tr>

</table>
</div>
</div>
</div>

<div class="modal fade" id="tambah_makmin" tabindex="-1" role="dialog" aria-labelledby="examplemodallabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="examplemodallabel" >FORM INPUT USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hiden="true">&times;</span></button>
        </div>
    <div class="modal-body">
    <form action="<?php echo base_url().'/admin/data_makmin/tambah_aksi';  ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Makanan/Minuman</label>
        <input type="text" name="nama_makmin" class="form-control">
    </div>
    <div class="form-group">
        <label>Keterangan</label>
        <input type="text" name="keterangan" class="form-control">
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <input type="text" name="kategori" class="form-control">
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type="text" name="harga" class="form-control">
    </div>
    <div class="form-group">
        <label>Gambar</label><br>
        <input type="file" name="gambar" class="form-control">
    </div>
    

    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
     <button type="submit" class="btn btn-primary" >Save</button>
    </div>
    </form>
    </div>
    </div>
</div>



