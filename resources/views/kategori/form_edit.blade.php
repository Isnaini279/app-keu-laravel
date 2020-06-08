@include('home.header')

<div class="container" style="width: 70%">
	<center>
		<h1 class="mt-5">Form Edit Kategori</h1>	
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
		<form action="{{url('store_edit_kategori',$dt->id_kategori)}}" method="POST">
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group row">
			    <label class="col-sm-2 col-form-label">Nama Kategori</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="nama_kategori" value="{{ $dt->nama_kategori }}" required>
			      
			    </div>
		  	</div>
		  	<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kategori</label>
			    <div class="col-sm-10">
			      <select name="jenis" class="form-control" required>
			      	<option value="0">---- Pilih Tipe Kategori ----</option>
			      	<option <?php if($dt->tipe_kategori == 'pemasukan'){echo "selected";} ?> value="pemasukan">Pemasukan</option>
			      	<option <?php if($dt->tipe_kategori == 'pengeluaran'){echo "selected";} ?>  value="pengeluaran">Pengeluaran</option>
			      </select>
			    </div>
			</div>
			<div class="form-group row">
			    <label class="col-sm-2 col-form-label">Deskripsi</label>
			    <div class="col-sm-10">
			      <textarea class="form-control" name="deskripsi" rows="3">{{ $dt->deskripsi }}</textarea>
			    </div>
		  	</div>
		  	{{ csrf_field() }}
		  	
		  	<input type="submit" name="submit" value="simpan" class="btn btn-primary btn-sm" style="margin-left: 92%; margin-top: 50px">
		</form>
	</div>

</div>

@include('home.footer')