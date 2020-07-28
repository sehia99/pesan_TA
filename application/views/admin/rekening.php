<div class="container-fluid">
<?php echo $this->session->flashdata('pesan'); ?>
<div class="card">
<h5 class="card-header">DATA REKENING</h5>
<div class="card-body">
<a href="<?php echo base_url('admin/rekening/form_rekening'); ?>"><button class="btn btn-sm btn-primary mb-3" ><i class="fas fa-plus fa-sm"></i> Tambah Rekening</button></a>

<table class="table table-bordered">

    <tr>
        <th>NAMA</th>
        <th>NAMA BANK</th>
        <th>NO. REKENING</th>
        <th colspan="2">AKSI</th>
    </tr>
    <?php  if($rek!=NULL){ ?>
    <?php foreach($rek as $rek) : ?>
    <tr>
    <td><?php echo $rek->nama ?></td>
    <td><?php echo $rek->nama_bank ?></td>
    <td><?php echo $rek->no_rekening ?></td>
    <td><?php echo anchor('admin/rekening/edit/'.$rek->id,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
    <td><button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_modal"><i class="fa fa-trash"></i></button></td>
    </tr>
    <?php endforeach; ?>
    <?php }else{ ?>
    <tr>
    <td colspan="5">Tidak Ada Data</td>
    </tr>
    <?php }; ?>
</table>
</div>
</div>
</div>
<div class="modal fade" id="tambah_makmin" tabindex="-1" role="dialog" aria-labelledby="examplemodallabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="examplemodallabel" >FORM INPUT MAKANAN/MINUMAN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hiden="true">&times;</span></button>
        </div>
    <div class="modal-body">
    <form id="tambah_makmin_form" action="<?php echo base_url().'/admin/data_makmin/tambah_aksi';  ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Makanan/Minuman</label>
        <input type="text" name="nama_makmin" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Keterangan</label>
        <input type="text" name="keterangan" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <select name="kategori" class="form-control" >
            <option value="Makanan">Makanan</option>
            <option value="Minuman">Minuman</option>
        </select>
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required>
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


<div class="modal fade" id="hapus_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Anda yakin mau Menghapus Data ini?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('admin/rekening/hapus/').$rek->id?>">Hapus</a>
        </div>
      </div>
    </div>
  </div>



