@include('home.header')

<div class="container" style="width: 80%; margin-top: 5%">
	<center><h1 class="mt-5">Tabel Transaksi</h1><br></center>
	<a style="margin-top: 20px; margin-bottom: 20px; margin-left: 85%" class="btn btn-success btn-sm" href="{{url('add_transaksi')}}"><i class="fa fa-plus"></i> Tambah Transaksi</a><br>
	<div style="margin-bottom: 20px">
		<form action="{{url('filter_trx')}}" method="POST">
			<span><label>Start Day </label> <input type="date" name="start"></span>
			<span><label>- End Day </label> <input type="date" name="end"></span>
			{{ csrf_field() }}
		  	<span><input type="submit" name="submit" value="filter" style="margin-left: 20px"></span>
		</form>	
	</div>
	
	<table>
		<tr>
			<td><h3>Total Saldo</h3></td>
			<td><h3>: {{ $saldo->total_saldo }}</h3></td>
		</tr>
	</table>

	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Jenis Transaksi</th>
				<th>Jenis Kategori</th>
				<th>Nominal</th>
				<th>Deskripsi</th>
				<th style="text-align: center;">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 0; ?>
				@foreach ($trx as $dt)
			<?php $no++; ?>
			<tr>
				<td>{{ $no }}</td>
				<td>{{ $dt->jenis_transaksi }}</td>
				<td>{{ $dt->nama_kategori }}</td>
				<td>{{ $dt->nominal }}</td>
				<td>{{ $dt->deskripsi }}</td>
				<td style="text-align: center;">
					<a class="btn btn-warning btn-sm" href="{{ url('edit_transaksi',$dt->id_transaksi) }}"><i class="fa fa-edit" style="color: white"></i> Edit</a>&nbsp;
					<a class="btn btn-danger btn-sm" href="{{ url('delete_transaksi',$dt->id_transaksi) }}"><i class="fa fa-trash"></i> Hapus</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@include('home.footer')