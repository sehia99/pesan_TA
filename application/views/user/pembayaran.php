<div class="container-fluid">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<h3 align="center">Pembayaran</h3>
<form action="<?php echo base_url('user/pembayaran/proses_bayar') ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
     <label>Metode Bayar</label>
     <select name="metode" class="form-control" >
            <?php foreach($metode as $metode): ?>
            <option value="<?php $metode->nama_bank ?>"><?php echo $metode->nama_bank.'-'.$metode->nama.'-'.$metode->no_rekening ?></option>
    <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <input type="hidden" name="id_invoice" value="<?php echo $id_invoice->id ?>">
        <label>Nama Pengirim</label>
        <input type="text" name="nama_peng" class="form-control" placeholder="Nama Pengirim">
    </div>
    <div class="form-group">
        <label>No. Rekening Pengirim</label>
        <input type="text" name="no_peng" class="form-control"placeholder="No. Rekening Pengirim">
    </div>
    <div class="form-group">
        <label>Bukti Pengiriman</label>
        <input type="file" name="gambar" class="form-control">
    </div>    
    <?php echo anchor('user/pesanan/detail_pesanan', '<div class="btn btn-danger btn-sm">Kembali </div>') ?>
    <button class="btn btn-success btn-sm" type="submit">Confirm</button>
</form>
</div>
<div class="col-md-2"></div>
</div>
</div>