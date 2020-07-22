<div class="container-fluid">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/slider1.jpg') ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('assets/img/slider2.jpg') ?>" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="row text-center mt-4">
<?php  foreach ($makanan as $makmin) : ?>
<form action="<?php echo base_url('dashboard/tambah_ke_keranjang') ?>" method="post">
    <div class="card ml-3 mb-3" style="width: 18rem;">
        <img src="<?php echo base_url().'/uploads/'.$makmin->gambar ?>" class="card-img-top img-fluid" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $makmin->nama_makmin ?></h5>
            <p class="card-text mb-2"><?php echo $makmin->keterangan ?></p>
            <span class="badge badge-pill badge-success mb-3">Rp. <?php echo number_format($makmin->harga, 0,',','.') ?></span><br>
            <span>Stok : <?php echo $makmin->stok ?></span><br>
            <label>Jumlah</label>
            <input type="hidden" name="id" value="<?php echo $makmin->id_makmin ?>">
            <div class="row">
            <div class="col-md-4"></div>
            <input type="number" name="jumlah" value="1" class="form-control col-md-4"><br>
            <div class="col-md-4"></div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-sm">Tambah Ke Keranjang</button>
            <?php echo anchor('welcome/detail/'.$makmin->id_makmin, '<div class="btn btn-success btn-sm">Detail</div>') ?>
        </div>
    </div>
    </form>
<?php endforeach; ?>

    </div>
</div>