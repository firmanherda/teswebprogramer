<?php

    namespace App\Http\Controllers\Admin;

    use App\Exports\ProductExport;
    use App\Helper\FormatHtml;
    use App\Helper\Storage;
    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use App\Models\Product;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use RealRashid\SweetAlert\Facades\Alert;
    use Excel;
    use RealRashid\SweetAlert\SweetAlertServiceProvider;

    class ProductController extends Controller
    {
        public function index(Request $request)
        {
            $categories = Category::all();
            $products = Product::select('products.*', 'c.name as category_name')
                ->join('categories as c', 'c.id', 'products.category_id')
                ->orderBy('id', 'ASC');

            if (!empty($request->category)) {
                $category = $request->category;
                $products->where('category_id', $category);
                Session::put('selected_category', $category);
            } else {
                Session::forget('selected_category');
            }

            if (!empty($request->search)) {
                $search = $request->search;
                $products->where(function ($query) use ($search) {
                    $query->where('products.name', 'ilike', '%' . $search . '%');
                });
                Session::put('search_query', $search);
            } else {
                Session::forget('search_query');
            }

            $products = $products->paginate(10);

            foreach ($products as $data) {
                $action = FormatHtml::action('admin.product.edit', $data->id);

                $data->edit = $action['edit'];
                $data->delete = $action['delete'];
                $data->image = Storage::getImageProduct($data->image);
            }


            $selectedCategory = $request->category;
            $searchQuery = $request->search;

            return view('product.index', compact('products', 'categories', 'selectedCategory', 'searchQuery'));
        }

        public function create()
        {
            $categories = Category::all();

            return view('product.create', compact('categories'));
        }

        public function store(Request $request)
        {

            $request->validate([
                'category' => 'required',
                'name' => 'required|string',
                'purchase_price' => 'required|numeric',
                'selling_price' => 'required|numeric',
                'stock' => 'required|integer',
                'fileToUpload' => 'required|file|mimes:png,jpg,jpeg|max:1000',
            ], [
                'category.required' => 'Kategori wajib diisi.',
                'name.required' => 'Nama barang wajib diisi.',
                'name.string' => 'Nama barang harus berupa teks.',
                'purchase_price.required' => 'Harga beli wajib diisi.',
                'purchase_price.numeric' => 'Harga beli harus berupa angka.',
                'selling_price.required' => 'Harga jual wajib diisi.',
                'selling_price.numeric' => 'Harga jual harus berupa angka.',
                'stock.required' => 'Stok barang wajib diisi.',
                'stock.integer' => 'Stok barang harus berupa angka bulat.',
                'fileToUpload.required' => 'File gambar wajib diunggah.',
                'fileToUpload.file' => 'File yang diunggah harus berupa file.',
                'fileToUpload.mimes' => 'File yang diunggah harus berformat PNG, JPG, atau JPEG.',
                'fileToUpload.max' => 'Ukuran file tidak boleh melebihi 100 KB.',
            ]);


            $product = new Product();
            $product->category_id = $request->category;
            $product->name = $request->name;
            $product->purchase_price = $request->purchase_price;
            $product->selling_price = $request->selling_price;
            $product->stock = $request->stock;
            $product->image = Storage::uploadImageProduct($request->file('fileToUpload'));
            $product->save();

            Alert::success('Sukses', 'Menambah Data!');
            return back();
        }

        public function edit($id)
        {
            $categories = Category::all();
            $product = Product::find($id);

            return view('product.edit', compact('product', 'categories', 'id'));
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'category' => 'required',
                'name' => 'required|string',
                'purchase_price' => 'required|numeric',
                'selling_price' => 'required|numeric',
                'stock' => 'required|integer',
                'fileToUpload' => 'file|mimes:png,jpg,jpeg|max:1000',
            ], [
                'category.required' => 'Kategori wajib diisi.',
                'name.required' => 'Nama barang wajib diisi.',
                'name.string' => 'Nama barang harus berupa teks.',
                'purchase_price.required' => 'Harga beli wajib diisi.',
                'purchase_price.numeric' => 'Harga beli harus berupa angka.',
                'selling_price.required' => 'Harga jual wajib diisi.',
                'selling_price.numeric' => 'Harga jual harus berupa angka.',
                'stock.required' => 'Stok barang wajib diisi.',
                'stock.integer' => 'Stok barang harus berupa angka bulat.',
                'fileToUpload.file' => 'File yang diunggah harus berupa file.',
                'fileToUpload.mimes' => 'File yang diunggah harus berformat PNG, JPG, atau JPEG.',
                'fileToUpload.max' => 'Ukuran file tidak boleh melebihi 100 KB.',
            ]);


            $product = Product::find($id);
            $product->category_id = $request->category;
            $product->name = $request->name;
            $product->purchase_price = $request->purchase_price;
            $product->selling_price = $request->selling_price;
            $product->stock = $request->stock;

            if($request->hasFile('fileToUpload')) {
                $product->image = Storage::uploadImageProduct($request->file('fileToUpload'));;
            }
            $product->save();

            Alert::success('Sukses', 'Mengubah Data!');
            return back();
        }

        public function destroy($id)
        {
            $product = Product::find($id);
            $product->delete();

            return back();
        }

        public function exportFiltered(Request $request)
        {
            $products = Product::select('products.*', 'c.name as category_name')
                ->join('categories as c', 'c.id', 'products.category_id');

            if ($request->category != "") {
                $products->where('category_id', $request->category);
            }

            if ($request->has('search')) {
                $search = $request->search;
                $products->where(function ($query) use ($search) {
                    $query->where('products.name', 'ilike', '%' . $search . '%');
                });
            }

            $data = $products->get();
            foreach ($data as $key => $product) {
                $product->id = $key+1;
            }

            return Excel::download(new ProductExport($data), 'data-product-'.now().'.xlsx');
        }

    }
