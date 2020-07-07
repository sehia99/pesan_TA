<div class="container-fluid">
<div class="card">
<?php echo $this->session->flashdata('pesan'); ?>
    <h5 class="card-header">Detail Makanan/Minuman</h5>
    <div class="card-body">
    <?php foreach($detail as $makmin) : ?>
        <div class="row">
            <div class="col-md-4"><img src="<?php echo base_url().'/uploads/'.$makmin->gambar ?>" class="card-img-top"></div>
            <div class="col-md-8">
            <table class="table">
            <tr>
                <td>Nama Makanan/Minuman</td>
                <td><strong ><?php echo $makmin->nama_makmin ?></strong></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><strong><?php echo $makmin->keterangan ?></strong></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td><strong><?php echo $makmin->kategori ?></strong></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><strong><div class="btn btn-sm btn-success">Rp. <?php echo number_format($makmin->harga, 0, ',','.') ?></div></strong></td>
            </tr>
            </table>
            <?php echo anchor('admin/data_makmin/index', '<div class="btn btn-sm btn-warning">Kembali</div>') ?>
            <?php echo anchor('admin/data_makmin/hapus/'.$makmin->id_makmin,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</div>')?>
            <?php echo anchor('admin/data_makmin/edit/'.$makmin->id_makmin,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</div>') ?>
            
            </div>
        </div>
<?php endforeach; ?>
    </div>
</div>

</div>