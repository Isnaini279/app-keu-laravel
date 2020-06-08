@include('home.header')

<div class="container" style="width: 70%">
	<center>
		<h1 class="mt-5">Form Edit Transaksi</h1>	
	</center>

	<div class="container" style="width: 100%; margin-top: 30px">
		@if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <b>{{ $error }}</b>
                    @endforeach
                </ul>
            </div>
        @endif		
		<form action="{{url('store_edit_transaksi',$trx->id_transaksi)}}" method="POST">
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Transaksi</label>
			    <div class="col-sm-10">
			      <select name="jenis" class="form-control" required>
			      	<option value="">---- Pilih Jenis Transaksi ----</option>
			      	<option <?php if($trx->jenis_transaksi == 'pemasukan'){echo "selected";} ?> value="pemasukan">Pemasukan</option>
			      	<option <?php if($trx->jenis_transaksi == 'pengeluaran'){echo "selected";} ?>  value="pengeluaran">Pengeluaran</option>
			      </select>
			    </div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kategori</label>
			    <div class="col-sm-10">
			      <select name="kategori" class="form-control" required>
			      	<option value="">---- Pilih Jenis Kategori ----</option>
			      	@foreach ($kategori as $k)
			      		@if ($k->id_kategori == $nama_k->id_kategori)
			      			<option value="{{ $k->id_kategori }}" selected>{{ $k->nama_kategori }} ({{ $k->tipe_kategori }})</option>
			      		@else
			      			<option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }} ({{ $k->tipe_kategori }})</option>
			      		@endif
			      	@endforeach
			      </select>
			    </div>
			</div>
			<div class="form-group row">
			    <label class="col-sm-2 col-form-label">Nominal</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" name="nominal" value="{{ $trx->nominal }}" placeholder="Masukkan nominal" required>
			    </div>
		  	</div>
			<div class="form-group row">
			    <label class="col-sm-2 col-form-label">Deskripsi</label>
			    <div class="col-sm-10">
			      <textarea class="form-control" name="deskripsi" rows="3">{{ $trx->deskripsi }}</textarea>
			    </div>
		  	</div>
		  	{{ csrf_field() }}
		  	
		  	<input type="submit" name="submit" value="simpan" class="btn btn-primary btn-sm" style="margin-left: 92%; margin-top: 50px">
		</form>
	</div>

</div>

@include('home.footer')