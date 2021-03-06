<div class="container-fluid">
<?php echo $this->session->flashdata('pesan'); ?>
<div class="card">
<h5 class="card-header">Detail Pesanan Anda</h5>
<div class="card-body">
 
<div class="row">
<table class="table">
<?php foreach($invoice as $invoice) : ?>
   <?php if($invoice->status == 'pesanan_confirm'){ ?>
    <div class="alert alert-success">
        Pesanan Telah Diterima, Silahkan Transfer Diantara No. Berikut : 
            <select class="form-control">
                <?php foreach($metode as $metode){ ?>
                <option><?php echo $metode->nama_bank,'-',$metode->nama,'-',$metode->no_rekening ?></option>
            <?php } ?>
            </select>
        
        
    </div>
<?php }else{}?>
<tr>
    <td>Nama Pemesan</td>
    <td><?php echo $invoice->nama; ?></td>
</tr>
<tr>
    <td>Alamat</td>
    <td><?php echo $invoice->alamat,', ', $invoice->nama_prov,', ', $invoice->nama_kab,', ', $invoice->nama_kec,', ', $invoice->nama_des; ?><!-- <a href="<?php echo base_url('user/pesanan/ganti_alamat/').$invoice->id ?>"><button class="btn btn-sm btn-primary ml-3">Ganti Alamat</button></a>--></td>
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
<tr>
<td>Estimasi</td>
<td><?php echo $invoice->estimasi ?></td>
</tr>
<tr>
    <td>Status</td>
    <?php if($invoice->status=='dikirim'){ ?>
    <td>Pesanan Sedang Dikirim</td>
    <?php }elseif($invoice->status == 'bayar_confirm'){ ?>
        <td>Pesanan Sedang Disiapkan</td>
    <?php }elseif($invoice->status == 'dibayar'){ ?>
    <td>Menunggu Konfirmasi Pembayaran</td>
    <?php }elseif($invoice->status == 'batal'){?>
    <td>Pesanan Dibatalkan</td>
    <?php }else{ ?>
    <td>Pesanan Belum Dibayar</td>
    <?php }; ?>
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
<a href="<?php echo base_url('user/pesanan') ?>"><div class="btn btn-secondary btn-sm">Kembali</div></a>
<?php if($id_komplain!=NULL){ ?>
    <div class="btn btn-sm btn-success">Komplain Sedang Diproses, Silahkan Tunggu Pesanan Datang</div>
    <a href="<?php echo base_url('user/pesanan/diterima/').$id_invoice->id ?>"><div class="btn btn-sm btn-primary">Pesanan Diterima</div></a>
<?php }elseif($invoice->status == 'diterima'){ ?>
    <div class="btn btn-sm btn-success">Pesanan Selesai</div>
<?php }elseif($invoice->status == 'dikirim'){ ?>
<a href="<?php echo base_url('user/pesanan/diterima/').$id_invoice->id ?>"><div class="btn btn-sm btn-primary">Pesanan Diterima</div></a>
    <a href="<?php echo base_url('user/pesanan/komplain/').$id_invoice->id ?>"><div class="btn btn-sm btn-danger">Komplain</div></a>
<?php }elseif($invoice->status == 'bayar_confirm'){ ?>
    <div class="btn btn-success btn-sm">Pembayaran Dikonfirmasi, Pesanan Anda Akan Segera Datang</div>
    <?php }else{if($invoice->status == 'dibayar'){ ?>
    <div class="btn btn-success btn-sm" >Menunggu Konfirmasi</div>
<?php }elseif($invoice->status == 'pesanan_confirm' || $invoice->status == 'bayar_ditolak'){ ?>
    <div class="btn btn-danger btn-sm" data-toggle="modal" data-target="#batalModal">Batal Pesan </div>
    <a href="<?php echo base_url('user/pembayaran/index/').$id_invoice->id ?>"><div class="btn btn-sm btn-success">Bayar</div></a>

<?php }else{ ?>
<div class="btn btn-danger btn-sm" data-toggle="modal" data-target="#batalModal">Batal Pesan </div>

<?php }}; ?>

</div>
</div>
</div>
</div>

<div class="modal fade" id="batalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Batal</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Anda yakin mau Membatalkan Pesanan?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('user/pesanan/batal_pesan/').$id_invoice->id; ?>">Yakin</a>
        </div>
      </div>
    </div>
  </div>