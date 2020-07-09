<div class="container-fluid">
<?php echo $this->session->flashdata('pesan'); ?>
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
    <div class="btn btn-success btn-sm" data-toggle="modal" data-target="#confirmModal">Confirm</div>
   
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bayar</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Anda yakin Data Pembayaran Sudah Benar?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-sm btn-primary">Confirm</button>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
<div class="col-md-2"></div>
</div>
</div>