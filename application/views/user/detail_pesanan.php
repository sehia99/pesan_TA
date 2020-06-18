<div class="container-fluid">
<div class="card">
<h5 class="card-header">Detail Pesanan Anda</h5>
<div class="card-body">
<div class="row">
<table class="table">
<?php foreach($invoice as $invoice) : ?>
<tr>
    <td>Nama Pemesan</td>
    <td><?php echo $invoice->nama; ?></td>
</tr>
<tr>
    <td>Alamat</td>
    <td><?php echo $invoice->alamat; ?></td>
</tr>
<tr>
    <td>No. Telephone</td>
    <td><?php echo $invoice->no_tlp; ?></td>
</tr>
<tr>
    <td>Tanggal Pesan</td>
    <td><?php echo $invoice->tgl_pesan ?></td>
</tr>
<tr>
    <td>Batas Bayar</td>
    <td><?php echo $invoice->batas_bayar ?></td>
</tr>
<?php endforeach; ?>
<tr>
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
<td><?php echo $pesanan->nama_makmin ?></td>
<td><?php echo $pesanan->jumlah ?></td>
<td align="right">Rp. <?php echo number_format($pesanan->harga, 0,',','.') ?></td>
<td align="right">Rp. <?php echo number_format($subtotal, 0,',','.') ?></td>
</tr>

<?php endforeach; ?>
<tr>
<td colspan="3" align="right">Total</td>
<td align="right">Rp. <?php echo number_format($total, 0,',','.') ?></td>
</tr>
</table>

</div>
<div align="right">
<a href="<?php echo base_url('user/pesanan') ?>"><div class="btn btn-primary btn-sm">Kembali</div></a>
<a href="<?php echo base_url('user/pesanan/batal_pesan').'/'.$id_invoice->id ?>"><div class="btn btn-danger btn-sm">Batal Pesan</div></a>
<?php if($invoice->confirm != 'confirm'){ ?>
    <a href="<?php echo base_url().'user/pembayaran/index/'.$id_invoice->id ?>"><div class="btn btn-success btn-sm">Bayar</div></a>
<?php }else{ ?>
    <div class="btn btn-success btn-sm">Pembayaran Dikonfirmasi, Pesanan Anda Akan Segera Datang</div>
<?php }; ?>

</div>
</div>
</div>
</div>