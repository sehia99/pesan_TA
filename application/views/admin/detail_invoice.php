<div class="container-fluid">
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
</table>
<a href="<?php echo base_url('admin/invoice/index') ?>"><div class="btn btn-sm btn-primary">Kembali</div></a>
</div>