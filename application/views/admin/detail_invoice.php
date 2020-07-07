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
<div align="right">
<a href="<?php echo base_url('admin/invoice/index') ?>"><div class="btn btn-sm btn-primary">Kembali</div></a>
<?php if($cek == FALSE){ ?>
    
<?php }else{if($invoice->confirm == 'confirm'){?>
<div class="btn btn-sm btn-success">Pembayaran Telah Dikonfirmasi, Silahkan Buat Pesanan!</div>
<?php }else{?>
<a href="<?php echo base_url('admin/invoice/confirm_bayar').'/'.$invoice->id ?>"><div class="btn btn-success btn-sm">Confirmasi Bayar</div></a>
<?php }};?>
</div>
</div>