<div class="container-fluid">
	<?php echo $this->session->flashdata('pesan'); ?>
<h4>Keranjang Makanan</h4>
<table class="table table-bordered table-striped table-hover">
<tr>
<th>No</th>
<th>Nama Makanan/Minuman</th>
<th>Jumlah</th>
<th>Harga</th>
<th>Sub Total</th>
<th colspan="2">Aksi</th>
</tr>
<?php $no=1;
foreach($this->cart->contents() as $item):
?>
<form action="<?php echo base_url('dashboard/update_keranjang') ?>" method="post" >
<input type="hidden" name="rowid" value="<?php echo $item['rowid'] ?>">
<tr>
<td><?php echo $no++ ?></td>
<td><?php echo $item['name'] ?></td>
<td><input type="number" class="form-control col-md-3" name="qty" value="<?php echo $item['qty'] ?>"  ></td>
<td align="right">Rp. <?php echo number_format($item['price'],0,',','.') ?></td>
<td align="right">Rp. <?php echo number_format($item['subtotal'],0,',','.' )?></td>
<td><button type="submit" class="btn btn-sm btn-primary">Update</button>
<a href="<?php echo base_url('dashboard/hapus_item_keranjang/').$item['rowid'] ?>" class="btn btn-sm btn-danger">Hapus</a></td>
</tr>
</form>
<?php endforeach; ?>
<tr>
<td colspan=5></td>
<td align="right">Rp. <?php echo number_format($this->cart->total(),0,',','.') ?></td>
</tr>
</table>
<?php foreach($user as $user): ?>
<form action="<?php echo base_url('dashboard/proses_pesanan') ?>" method="post">
<div class="form-group col-md-6">
	<label>Alamat Tujuan</label>
	<input type="text" name="alamat" class="form-control" value="<?php echo $user->alamat ?>">
	<!--<select name="prov" class="form-control" id="provinsi" >
                  <option value="<?php echo $user->prov ?>"><?php echo $user->nama_prov ?></option>
                  <?php 
                    foreach($provinsi as $prov)
                    {
                      echo '<option value="'.$prov->id.'">'.$prov->nama.'</option>';
                    }
                  ?>
                </select> -->
                <input type="hidden" name="prov" value="33">
                 <select name="kab" class="form-control" id="kabupaten" required>
                  <option value="<?php echo $user->kab ?>"><?php echo $user->nama_kab ?></option>
                  <?php foreach($kabupaten as $kab)
                    echo '<option value="'.$kab->id.'">'.$kab->nama.'</option>';
                   ?>
                </select>
                <select name="kec" class="form-control" id="kecamatan" required>
                <option value="<?php echo $user->kec ?>"><?php echo $user->nama_kec ?></option>
              </select>
              <select name="des" class="form-control" id="desa" required>
                <option value="<?php echo $user->des ?>"><?php echo $user->nama_des ?></option>
              </select>   
</div>
<div align="right">
<a href="<?php echo base_url('dashboard/hapus_keranjang')  ?>"><div class="btn btn-sm btn-danger">Kosongkan Keranjang</div></a>
<a href="<?php echo base_url('welcome/index')  ?>"><div class="btn btn-sm btn-primary">Lanjut Belanja</div></a>
<button type="submit" class="btn btn-sm btn-success">Pesan</button>
</div>
</form>
<?php endforeach; ?>
</div>