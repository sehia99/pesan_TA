<div class="container-fluid">
<h4>Invoice Pemesanan Makanan </h4>
<table class="table table-bordered table-hover table-striped">
<tr>
<th>Id Invoice</th>
<th>Nama Pemesan</th>
<th>Alamat Pengiriman</th>
<th>Tanggal Pemesanan</th>
<th>Batas Pembayaran</th>
<th>Aksi</th>
</tr>
<?php foreach($invoice as $invoice) : ?>
<tr>
<td><?php echo $invoice->id; ?></td>
<td><?php echo $invoice->nama; ?></td>
<td><?php echo $invoice->alamat; ?></td>
<td><?php echo $invoice->tgl_pesan; ?></td>
<td><?php echo $invoice->batas_bayar; ?></td>
<td><?php echo anchor('admin/invoice/detail/'.$invoice->id, '<div class="btn btn-sm btn-primary">Detail</div>'); ?></td>
</tr>
<?php endforeach; ?>
</table>
</div>