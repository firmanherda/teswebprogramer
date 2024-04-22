@extends('layouts.app')
@section('content')
	<div class="container-fluid py-4">
		<form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data" id="productForm">
			@csrf
			<div class="row">
				<div class="col-12">
					<h4><span class="">Daftar Produk</span> > Tambah Product</h4>
					<div class="row">
						<div class="col-md-4">
							<div class="mb-3">
								<label for="category" class="form-label">Kategori</label>
								<select class="form-control form-control-lg" name="category" id="category">
									<option value="">Pilih Kategori</option>
									@foreach($categories as $data)
										<option value="{{$data->id}}">{{$data->name}}</option>
									@endforeach
								</select>
								@error('category')
								<div class="form" style="font-size: 12px; color: red">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-8">
							<div class="mb-3">
								<label for="name" class="form-label">Nama Barang</label>
								<input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Masukkan Nama Barang">
								@error('name')
								<div class="form" style="font-size: 12px; color: red">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="mb-3">
								<label for="purchase_price" class="form-label">Harga Beli</label>
								<input type="number" class="form-control form-control-lg" name="purchase_price" id="purchase_price" placeholder="Masukkan Harga Beli">
								@error('purchase_price')
								<div class="form" style="font-size: 12px; color: red">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label for="selling_price" class="form-label">Harga Jual</label>
								<input type="number" class="form-control form-control-lg" name="selling_price" id="selling_price" placeholder="Masukkan Harga Jual" readonly>
								@error('selling_price')
								<div class="form" style="font-size: 12px; color: red">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-4">
							<div class="mb-3">
								<label for="stock" class="form-label">Stok Barang</label>
								<input type="number" class="form-control form-control-lg" name="stock" id="stock" placeholder="Masukkan Stok Barang">
								@error('stock')
								<div class="form" style="font-size: 12px; color: red">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-12">
							<label for="fileToUpload" class="form-label">Upload Image</label>
							<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
							@error('fileToUpload')
							<div class="form" style="font-size: 12px; color: red">{{ $message }}</div>
							@enderror
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 text-md-end"> <!-- Menggunakan "text-md-end" untuk mengatur teks sejajar kanan pada ukuran medium dan lebih besar -->
							<a href="{{route('admin.product.index')}}" class="btn btn-secondary">Batalkan</a>
							<button type="submit" class="btn btn-primary" name="submit">Simpan</button>
						</div>
					</div>

				</div>
			</div>
		</form>
	</div>

	<script>
        // Menggunakan JavaScript untuk menghitung dan mengisi nilai Selling Price berdasarkan nilai Purchase Price
        document.getElementById("purchase_price").addEventListener("input", function() {
            var purchasePrice = parseFloat(this.value); // Mengambil nilai Purchase Price
            if (!isNaN(purchasePrice)) {
                var sellingPrice = purchasePrice * 1.3; // Menghitung 130% dari Purchase Price
                document.getElementById("selling_price").value = sellingPrice.toFixed(2); // Mengisi nilai Selling Price
            }
        });
	</script>
@endsection
