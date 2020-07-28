<html><head>
  <tittle></tittle>
  <style>
  table {
    border-left: 0.01em solid #ccc;
    border-right: 0;
    border-top: 0.01em solid #ccc;
    border-bottom: 0;
    border-collapse: collapse;
}
table td,
table th {
    border-left: 0;
    border-right: 0.01em solid #ccc;
    border-top: 0;
    border-bottom: 0.01em solid #ccc;
}
</style>
</head><body>
<h3 style="text-align: center;">LAPORAN PENJUALAN</h3>

  <table class="table" style="align-content: center;" width="100%">

    <tr>
      <th>NO</th>
      <th>ID PESANAN</th>
      <th>TANGGAL</th>
      <th>NAMA PELANGGAN</th>
      <th>JUMLAH</th>
    </tr>
    <?php if(!$lap){ ?>
      <tr>
        <td colspan="4" style="text-align: center">Tidak Ada Data !</td>
      </tr>
    <?php
    }else{ 
    $no = 1;
    $total = 0;
    foreach($lap as $lap): 
      
    $total +=$lap->total;
      ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $lap->id ?></td>
      <td><?php echo $lap->tgl_pesan ?></td>
      <td><?php echo $lap->nama ?></td>
      <td>Rp. <?php echo number_format($lap->total, 0,',','.') ?></td>
      </tr>
  <?php 
//$total_s = 0;
 // $total_s += $lap->subtotal;
endforeach; 
  
  
  ?>
  <tr>
  <td colspan="4" style="text-align: right;">Total Pendapatan </td>
  <td>Rp. <?php echo number_format($total, 0,',','.') ?></td>
</tr>
<?php } ?>
  </table>
</body></html>

