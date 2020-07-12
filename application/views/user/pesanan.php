<div class="container-fluid">
<?php echo $this->session->flashdata('pesan'); ?>
<h4>Pesanan Anda </h4>
<table class="table table-bordered table-hover table-striped">
<tr>
<th>Id Pesanan</th>
<th>Tanggal Pemesanan</th>
<th>Batas Pembayaran</th>
<th colspan="2">Aksi</th>
</tr>
<?php if($invoice!=NULL){ ?>
<?php foreach($invoice as $invoice) : ?>
<tr>
<td><?php echo $invoice->id; ?></td>
<td><?php echo $invoice->tgl_pesan; ?></td>
<td><?php echo $invoice->batas_bayar; ?></td>
<td><?php echo anchor('user/pesanan/detail/'.$invoice->id, '<div class="btn btn-sm btn-primary">Detail</div>'); ?></td>
<td>
<?php if($invoice->status == 'diterima'){ ?>
    <div class="btn btn-success btn-sm">Pesanan Selesai</div>
    <?php }elseif($invoice->proses == 'komplain'){ ?>
    <div class="btn btn-danger btn-sm">Komplain</div>
<?php }elseif($invoice->proses == 'dikirim'){ ?>
    <div class="btn btn-success btn-sm">Pesanan Sedang Dikirim</div>
<?php }elseif($invoice->confirm == 'confirm'){ ?>
    <div class="btn btn-success btn-sm">Pesanan Sedang Di Siapkan!</div>
<?php }elseif($invoice->confirm == 'dibayar'){ ?>
    <div class="btn btn-success btn-sm">Menunggu Konfirmasi</div>
<?php }else{ ?>
    <div class="btn btn-danger btn-sm">Belum Dibayar</div>
<?php }; ?></td>

</tr>
<?php endforeach; ?>
<?php }else{?>
<tr>
<td colspan="5" align="center">Tidak Ada Pesanan</td>
</tr>
<?php }; ?>
</table>
</div>


