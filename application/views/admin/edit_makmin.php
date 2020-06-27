<div class="container-fluid">
<h5><i class="fas fa-edit mb-3"></i>EDIT DATA MAKANAN/MINUMAN</h5>
<?php foreach($makmin as $makmin): ?>
<form action="<?php echo base_url().'admin/data_makmin/update' ?>" method="post">

    <div class="form-group">
    <input type="hidden" name="id_makmin" class="form-control" value="<?php echo $makmin->id_makmin; ?>">
    <label>Nama Makanan/Minuman</label>
    <input type="text" name="nama_makmin" class="form-control" value="<?php echo $makmin->nama_makmin; ?>">
    </div>
    <div class="form-group">
    <label>Keterangan</label>
    <input type="text" name="keterangan" class="form-control" value="<?php echo $makmin->keterangan; ?>">
    </div>
    <div class="form-group">
    <label>Kategori</label>
    <input type="text" name="kategori" class="form-control" value="<?php echo $makmin->kategori; ?>">
    </div>
    <div class="form-group">
    <label>Harga</label>
    <input type="text" name="harga" class="form-control" value="<?php echo $makmin->harga; ?>">
    </div>
    <?php echo anchor('admin/data_makmin/index', '<div class="btn btn-sm btn-danger mt-3">Kembali</div>') ?>
    <button type="submit" class="btn btn-primary btn-sm mt-3 ml-2">Simpan</button>
</form>
<?php endforeach; ?>
</div>