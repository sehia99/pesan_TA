<div class="container-fluid">
<?php echo $this->session->flashdata('pesan'); ?>
<div class="card">
<h4 class="card-header">Invoice Pemesanan Makanan </h4>
<div class="card-body">
<table class="table table-bordered table-hover table-striped">
<tr>
<th>Id Invoice</th>
<th>Nama Pemesan</th>
<th>Alamat Pengiriman</th>
<th>No. HP</th>
<th>Batas Pembayaran</th>
<th colspan="2">Aksi</th>
</tr>
<?php if($invoice!=NULL){ ?>
<?php foreach($invoice as $invoice) : 
    ?>
<tr>
<td><?php echo $invoice->id; ?></td>
<td><?php echo $invoice->nama; ?></td>
<td><?php echo $invoice->alamat,', ', $invoice->nama_prov,', ', $invoice->nama_kab,', ', $invoice->nama_kec,', ', $invoice->nama_des; ?></td>
<td><?php echo $invoice->no_tlp ?></td>
<td><?php echo $invoice->batas_bayar; ?></td>
<td><?php echo anchor('admin/invoice/detail/'.$invoice->id, '<div class="btn btn-sm btn-primary">Detail</div>'); ?></td>
<?php if($invoice->komplain != NULL){ ?>
<td><div class="btn btn-sm btn-danger">User Komplain</div></td>
<?php }else{if($invoice->status == 'batal'){ ?>
<td><div class="btn btn-sm btn-danger">Pesanan Batal</div></td>
<?php }elseif($invoice->status == 'diterima'){ ?>
<td><div class="btn btn-sm btn-success">Pesanan Selesai</div></td>
<?php }elseif($invoice->status == 'dikirim'){ ?>
<td><div class="btn btn-sm btn-success">Menunggu Konfirmasi User</div></td>
<?php }elseif($invoice->status == 'bayar_confirm'){ ?>
    <td><div class="btn btn-sm btn-success">Pesanan Sudah Dibayar</div></td>
<?php }elseif($invoice->status == 'dibayar'){ ?>
    <td><div class="btn btn-sm btn-success">Perlu Konfirmasi</div></td>
<?php }elseif($invoice->status== 'pesanan_confirm' || $invoice->status == 'bayar_ditolak' ){ ?>
    <td><div class="btn btn-sm btn-danger">Pesanan Belum Dibayar</div></td>
<?php }else{?>
	<td><div class="btn btn-sm btn-danger">Pesanan perlu Konfirmasi</div></td>
<?php }} ?>
</tr>
<?php endforeach; ?>
<?php }else{ ?>
<tr>
<td colspan="7">Tidak Ada Pesanan</td>
</tr>
<?php };?>
</table>
</div>
</div>
</div>