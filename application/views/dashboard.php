<div class="container-fluid">
    <div class="row text-center">
    <?php  foreach ($makmin as $makmin) : ?>
        <div class="card" style="width: 18rem;">
            <img src="<?php echo base_url().'/uploads/'.$makmin->gambar ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $makmin->nama_makmin ?></h5>
                <p class="card-text mb-2"><?php echo $makmin->keterangan ?></p>
                <span class="badge badge-pill badge-success mb-3">Rp. <?php echo $makmin->harga ?></span><br>
                <a href="#" class="btn btn-sm btn-primary">Tambah Ke Keranjang</a>
                <a href="#" class="btn btn-sm btn-success">Detail</a>
            </div>
        </div>
    <?php endforeach; ?>

    </div>
</div>