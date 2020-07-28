<div class="container-fluid">
<div class="card">
<h5 class="card-header"><i class="fas fa-edit mb-3"></i>EDIT DATA MAKANAN/MINUMAN</h5>
<div class="card-body">
<?php foreach($makmin as $makmin): ?>
<form action="<?php echo base_url().'admin/data_makmin/update' ?>" method="post">

    <div class="form-group">
    <input type="hidden" name="id_makmin" class="form-control" value="<?php echo $makmin->id_makmin; ?>">
    <label>Nama Makanan/Minuman</label>
    <input type="text" name="nama_makmin" class="form-control" value="<?php echo $makmin->nama_makmin; ?>">
    <?php echo form_error('nama_makmin', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    <div class="form-group">
    <label>Keterangan</label>
    <input type="text" name="keterangan" class="form-control" value="<?php echo $makmin->keterangan; ?>" required>
    </div>
    <div class="form-group">
    <label>Kategori</label>
    <select name="kategori" class="form-control" >
    <?php 
    $stringMa = "";
    $stringMi = "";
    if($makmin->kategori == "Makanan" ){ 
        $stringMa = "SELECTED";
    }else{
        $stringMi= "SELECTED";
    }
    ?>
            <option value="Makanan" <?php echo $stringMa; ?> >Makanan</option>
            <option value="Minuman" <?php echo $stringMi; ?>>Minuman</option>
        </select>
    </div>
    <div class="form-group">
    <label>Harga</label>
    <input type="text" name="harga" class="form-control" value="<?php echo $makmin->harga; ?>">
    <?php echo form_error('harga', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    
    <div class="form-group">
    <label>Stok</label>
    <input type="number" name="stok" class="form-control" value="<?php echo $makmin->stok; ?>">
    <?php echo form_error('stok', '<div class="text-danger small ml-2">*','</div>') ?>
    </div>
    <?php echo anchor('admin/data_makmin/index', '<div class="btn btn-sm btn-danger mt-3">Kembali</div>') ?>
    <button type="submit" class="btn btn-primary btn-sm mt-3 ml-2">Simpan</button>
</form>
<?php endforeach; ?>
</div>
</div>
</div>