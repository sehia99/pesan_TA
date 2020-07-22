<div class="container-fluid">
  <h3>LAPORAN PENJUALAN </h3>
  <div class="row">
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
  <form action="<?php echo base_url('admin/laporan/get_laporan') ?>" method="post" >
    <div class="form-group">
      <label>Start Date</label>
    <input type="date" name="start" value="<?php echo date('Y-m-d') ?>">
  
    <label>End Date</label>
    <input type="date" name="end" value="<?php echo date('Y-m-d') ?>">
  
  <button class="btn btn-sm btn-primary" type="submit">Cari</button> </div>
  </form>
</div>
  <table id="table" class="table table-striped table-hover">

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
</div>

