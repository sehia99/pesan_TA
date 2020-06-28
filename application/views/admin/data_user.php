<div class="container-fluid">
<table class="table table-bordered">

<tr>
    <th>NAMA</th>
    <th>KETERANGAN</th>
    <th>KATEGORI</th>
    <th>HARGA</th>
    <th colspan="3">AKSI</th>
</tr>
<?php foreach($data as $data) : ?>
<tr>
<td><?php echo $makmin->nama_makmin ?></td>
<td><?php echo $makmin->keterangan ?></td>
<td><?php echo $makmin->kategori ?></td>
<td><?php echo $makmin->harga ?></td>
<td><?php echo anchor('admin/data_makmin/detail_makmin/'.$makmin->id_makmin,'<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?></td>
<td><?php echo anchor('admin/data_makmin/edit/'.$makmin->id_makmin,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
<td><?php echo anchor('admin/data_makmin/hapus/'.$makmin->id_makmin,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?></td>
<?php endforeach; ?>
</tr>

</table>
</div>