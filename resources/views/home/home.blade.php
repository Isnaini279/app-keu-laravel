@include('home.header')

<div class="container" style="width: 70%; margin-top: 5%">
	<center><h1 class="mt-5">Data Keuangan</h1><br></center>
	<table>
		<tr>
			<td><h3>Total Saldo</h3></td>
			<td><h3>: {{ $pemasukan->total_pemasukan-$pengeluaran->total_pengeluaran }}</h3></td>
		</tr>
		<tr>
			<td><h3>Total Pengeluaran</h3></td>
			<td><h3>: {{ $pengeluaran->total_pengeluaran }}</h3></td>
		</tr>
		<tr>
			<td><h3>Total Pemasukan</h3></td>
			<td><h3>: {{ $pemasukan->total_pemasukan }}</h3></td>
		</tr>
	</table>
</div>

@include('home.footer')