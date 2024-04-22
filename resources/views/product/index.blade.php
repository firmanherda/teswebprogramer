@extends('layouts.app')
@section('content')
    @include('sweetalert::alert')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h4>Daftar Produk</h4>

                <div class="row align-items-center">
                    <div class="col-md-6 d-flex align-items-center">
                        <input type="text" class="me-2" placeholder="Search.." name="search" id="search" value="{{ Session::get('search_query') }}">
                        <select name="category" class="" id="category">
                            <option value="">Semua</option>
                            @foreach($categories as $data)
                                <option value="{{$data->id}}" {{ Session::get('selected_category') == $data->id ? 'selected' : '' }}>{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('admin.product.exportFiltered', ['category' => $selectedCategory, 'search' => $searchQuery]) }}" class="btn btn-primary me-2" style="background-color: green">Export Excel</a>
                        <a href="{{route('admin.product.create')}}" class="btn btn-primary">Tambah Produk</a>
                    </div>
                </div>

                <div class="card my-4">
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Image</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori Produk</th>
                                    <th>Harga Beli (Rp)</th>
                                    <th>Harga Jual (Rp)</th>
                                    <th>Stok Produk</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach($products as $data)
                                    <tr>
                                        <td class="text-center">{{$loop->index+1}}</td>
                                        <td>
                                            <div class="text-center">
                                                <a href="{{asset($data->image)}}" target="_blank">
                                                    <div>
                                                        <img src="{{asset($data->image)}}" class="avatar avatar-sm border-radius-lg" alt="user1">
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->category_name}}</td>
                                        <td>{{ number_format($data->purchase_price, 0, ',') }}</td>
                                        <td>{{ number_format($data->selling_price, 0, ',') }}</td>
                                        <td>{{$data->stock}}</td>
                                        <td>
                                            {!! $data->edit !!}
                                            &nbsp;
                                            {!! $data->delete !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>Show {{$products->perPage()}} from {{$products->total()}}</div>
                    <div>{{$products->onEachSide(0)->links()}}</div>
                </div>
            </div>
        </div>
    </div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('#search').addEventListener('input', function() {
            filterProducts();
        });

        document.querySelector('#category').addEventListener('change', function() {
            filterProducts();
        });

        function filterProducts() {
            var searchValue = document.querySelector('#search').value;
            var categoryValue = document.querySelector('#category').value;

            // Redirect ke halaman index dengan parameter query string yang sesuai
            var baseUrl = "{{ route('admin.product.index') }}";
            var url = baseUrl + "?search=" + searchValue + "&category=" + categoryValue;
            window.location.href = url;
        }


        // Delete Validation
        const deleteButtons = document.querySelectorAll('.modal-deletetab');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Menghentikan tindakan bawaan dari link

                const id = this.getAttribute('data-id');

                swal({
                    title: "Yakin?",
                    text: "kamu akan menghapus data ini ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        window.location =
                                "/admin/product/destroy/" + id + "";
                        swal("Data berhasil dihapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Data Tidak Jadi dihapus");
                    }
                });
            });
        });
        // End Delete Validation
    });

</script>
