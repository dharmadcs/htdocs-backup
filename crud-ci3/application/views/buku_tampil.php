<div style="margin-bottom: 20px;">
	<a href="<?=site_url('buku/add');?>"><button class="btn">Tambah</button></a>
</div>

<table class="data" border="1">
	<tr>
		<th>No.</th>
		<th>Nama Barang</th>
		<th>Jumlah Barang</th>
		<th>Tahun Pembelian</th>
		<th></th>
	</tr>
	<?php
	$no = 1;
	foreach ($buku as $b => $row) { ?>
		<tr>
			<td><?=$no++;?></td>
			<td><?=$row->nama_barang;?></td>
			<td><?=$row->jumlah;?></td>
			<td><?=$row->tahun_pembelian;?></td>
			<td>
				<a href="<?=site_url('buku/edit/'.$row->id_buku);?>"><button class="btn">Edit</button></a>
				<a href="<?=site_url('buku/del/'.$row->id_buku);?>" onclick="return confirm('Yakin akan menghapus data?')"><button class="btn">Hapus</button></a>
			</td>
		</tr>
	<?php	
	} ?>
</table>