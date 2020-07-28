<div class="container-fluid">
  <?php echo $this->session->flashdata('pesan'); ?>
  <div class="card">
  <h5 class="card-header">LAPORAN PENJUALAN </h3>
  <div class="card-body">
  <div class="row">
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
  <form action="<?php echo base_url('admin/laporan/get_laporan') ?>" method="post" >
    <div class="form-group">
      <label>Start Date</label>
    <input type="date" name="start" >
  
    <label>End Date</label>
    <input type="date" name="end" >
  
  <button class="btn btn-sm btn-primary" type="submit">Cari</button> 
  <button class="btn btn-sm btn-danger ml-2" type="button" data-toggle="modal" data-target="#print_modal">Print</button>
  <button class="btn btn-sm btn-warning ml-2" type="button" data-toggle="modal" data-target="#pdf_modal">Export PDF</button>
</div>
  </form>
  
</div>

  <table id="table" class="table table-hover table-bordered">

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
</div>
</div>

<div class="modal fade" id="pdf_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Export PDF</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
         <?php date_default_timezone_set('Asia/Jakarta'); ?>
          <form action="<?php echo base_url('admin/laporan/pdf') ?>" method="post" >
    <div class="form-group">
      <label>Start Date</label>
    <input type="date" name="start" class="form-control" value="<?php echo date('Y-m-d') ?>">
  </div>
  <div class="form-group">
    <label>End Date</label>
    <input type="date" name="end" class="form-control" value="<?php echo date('Y-m-d') ?>">
  
 </div>
  
        </div>
      
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" >Export PDF</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="print_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Print</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
         <?php date_default_timezone_set('Asia/Jakarta'); ?>
          <form action="<?php echo base_url('admin/laporan/print') ?>" method="post" >
    <div class="form-group">
      <label>Start Date</label>
    <input type="date" name="start" class="form-control" value="<?php echo date('Y-m-d') ?>">
  </div>
  <div class="form-group">
    <label>End Date</label>
    <input type="date" name="end" class="form-control" value="<?php echo date('Y-m-d') ?>">
  
 </div>
  
        </div>
      
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" >Print</button>
        </form>
        </div>
      </div>
    </div>
  </div>

