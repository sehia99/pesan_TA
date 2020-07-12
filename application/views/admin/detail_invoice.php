<div class="container-fluid mb-3">
<?php echo $this->session->flashdata('pesan'); ?>
<h4>Detail Pesanan <div class="btn btn-sm btn-success">No. Invoice: <?php echo $invoice->id; ?></div></h4>

<table class="table table-bordered table-hover table-striped">
<tr>
<th>NO</th>
<th>NAMA MAKANAN/MINUMAN</th>
<th>JUMLAH PESANAN</th>
<th>HARGA SATUAN</th>
<th>SUB-TOTAL</th>
</tr>
<?php 
$total = 0;
foreach($pesanan as $pesanan) :
    $subtotal = $pesanan->jumlah * $pesanan->harga;
    $total +=$subtotal;
?>
<tr>
<td><?php echo $pesanan->id_makmin ?></td>
<td><?php echo $pesanan->nama_makmin ?></td>
<td><?php echo $pesanan->jumlah ?></td>
<td align="right">Rp. <?php echo number_format($pesanan->harga, 0,',','.') ?></td>
<td align="right">Rp. <?php echo number_format($subtotal, 0,',','.') ?></td>
</tr>

<?php endforeach; ?>
<tr>
<td colspan="4" align="right">Total</td>
<td align="right">Rp. <?php echo number_format($total, 0,',','.') ?></td>

</tr>
<?php if($komplain != NULL){ foreach($komplain as $komplain): ?>
<tr>
<td>Komplain</td>
</tr>
<tr>
<td>Komplain</td>
<td><?php echo $komplain->komplain ?></td>
</tr>
<?php endforeach; }else{ ?>
<tr>
<td>Tidak Ada Komplain</td></tr>
<?php }; ?>
<?php if($cek == FALSE){ ?>
    <div class="btn btn-sm btn-danger mb-3">Pesanan Belum Dibayar</div>
<?php }else{foreach($pembayaran as $byr) : ?>
<tr>
<td>Confirmasi Pembayaran</td>
</tr>
<tr>
<td>Nama Pengirim</td>
<td><?php echo $byr->nama_peng ?></td>
</tr>
<tr>
<td>No. Pengirim</td>
<td><?php echo $byr->no_peng ?></td>
</tr>
<tr>
<td>Bukti Pembayaran</td>
<td><img src="<?php echo base_url().'uploads/pembayaran/'.$byr->gambar ?>"></td>
</tr>
<tr>
<td>Tanggal Pembayaran</td>
<td><?php echo $byr->tgl_dibayar ?></td>
</tr>
<?php endforeach; ?>

<?php };?>
    
</table>
<div class="row">
<a href="<?php echo base_url('admin/invoice/index') ?>"><div class="btn btn-sm btn-secondary">Kembali</div></a>

<?php if($cek == FALSE){ ?>
<?php }elseif($invoice->proses == 'dikirim'){?>
<div class="btn btn-sm btn-success ml-3">Pesanan Selesai</div>    
<?php }elseif($invoice->confirm == 'confirm'){?>
<div class="ml-2 btn btn-sm btn-success">Pembayaran Telah Dikonfirmasi, Silahkan Buat Pesanan!</div>
<a href="<?php echo base_url('admin/invoice/kirim_pesanan/').$invoice->id ?>"><div class="ml-2 btn btn-sm btn-primary">Kirim Pesanan</div></a>
<?php }else{?>
<form class="ml-3" action="<?php echo base_url('admin/invoice/confirm_bayar') ?>" method="post">
<input type="hidden" name="id" value="<?php echo $invoice->id ?>">
<input type="text" name="estimasi" placeholder ="Waktu Estimasi Selesai" class="form-control mb-2" required>
<button class="btn btn-success btn-sm " type="submit">Confirmasi Pembayaran</button>
</form>
<?php };?>
</div>
</div>

