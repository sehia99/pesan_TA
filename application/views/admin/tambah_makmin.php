<div class="container-fluid">
<?php echo $this->session->flashdata('pesan'); ?>
<h5>TAMBAH MAKANAN / MINUMAN</h5>
<form id="tambah_makmin_form" action="<?php echo base_url().'/admin/data_makmin/tambah_aksi';  ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Makanan/Minuman</label>
        <input type="text" name="nama_makmin" class="form-control" required>
        <?php echo form_error('nama_makmin', '<div class="text-danger small ml-2">*','</div>') ?>
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
        <?php echo form_error('harga', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    <div class="form-group">
        <label>Gambar</label><br>
        <input type="file" name="gambar" class="form-control">
        <?php echo form_error('gambar', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    

    
     <a href="<?php echo base_url('admin/data_makmin/index'); ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
     <button type="submit" class="btn btn-primary" >Save</button>
    </form>

</div>