@include('home.header')

<div class="container" style="width: 70%; margin-top: 5%">
	<center><h1 class="mt-5">Tabel Kategori</h1><br></center>
	<a style="margin-top: 20px; margin-bottom: 20px; margin-left: 83%" class="btn btn-success btn-sm" href="{{url('add_kategori')}}"><i class="fa fa-plus"></i> Tambah Kategori</a>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Nama Kategori</th>
				<th>Jenis Kategori</th>
				<th>Deskripsi</th>
				<th style="text-align: center;">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0; ?>
				@foreach ($kategori as $dt)
			<?php $i++; ?>
			<tr>
				<td>{{ $i }}</td>
				<td>{{ $dt->nama_kategori }}</td>
				<td>{{ $dt->tipe_kategori }}</td>
				<td>{{ $dt->deskripsi }}</td>
				<td style="text-align: center;">
					<a class="btn btn-warning btn-sm" href="{{ url('edit_kategori',$dt->id_kategori) }}"><i class="fa fa-edit" style="color: white"></i> Edit</a>&nbsp;
					<a class="btn btn-danger btn-sm" href="{{ url('delete_kategori',$dt->id_kategori) }}"><i class="fa fa-trash"></i> Hapus</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@include('home.footer')