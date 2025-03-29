<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Products::with('category');
        $categories = Category::all();
        //tìm kiếm theo mã sản phẩm
        if ($request->filled('ma_san_pham')) {
            $query->where('ma_san_pham', 'LIKE', '%' . $request->ma_san_pham . '%');
        }
        if ($request->filled('ten_san_pham')) {
            $query->where('ten_san_pham', 'LIKE', '%' . $request->ten_san_pham . '%');
        }
        if ($request->filled('ten_san_pham')) {
            $query->where('ten_san_pham', 'LIKE', '%' . $request->ten_san_pham . '%');
        }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->filled('gia_min') && $request->filled('gia_max')) {
            $query->whereBetween('gia', [$request->gia_min, $request->gia_max]);
        }
        if ($request->filled('ngay_nhap')) {
            $query->whereDate('ngay_nhap', $request->ngay_nhap);
        }
        if ($request->filled('trang_thai')) {
            $query->where('trang_thai', $request->trang_thai);
        }

        // tương tự thực hiện tìm kiếm sản phẩm theo:
        //tên sản phẩm, danh mục, khoảng giá,ngày nhập,trạng thái
        $products = $query->orderBy('created_at', 'DESC')->paginate(5); // Phân trang mỗi trang 5 sản phẩm
        return view('admin.products.index', compact('products', 'categories'));
    }
    public function indexx()
    {

        return view('admin.dashboard');
    }
    public function show($id)
    {
        // lấy ra dữ liệu chi tiết theo id
        $product = Products::with('category')->findOrFail($id);
        // đổ dữ liệu thông tin chi tiết ra giao diện
        return view('admin.products.show', compact('product'));
    }
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }
    // xây dựng master layout trang quản trị
    // tạo 1 trang để quản lý thông tin sản phẩm
    // Thực hiện hiển thị danh sách sản phẩm ra bảng ( có phân trang)
    public function store(Request $request)
    {
        // khởi tạo 1 đối tượng product mới
        // dd($request);

        // $product = new Products();
        // //lấy dữ liệu từ form
        // $product->ma_san_pham = $request->ma_san_pham;
        // $product->ten_san_pham = $request->ten_san_pham;
        // $product->category_id = $request->category_id;
        // $product->gia = $request->gia;
        // $product->gia_khuyen_mai = $request->gia_khuyen_mai;
        // $product->so_luong = $request->so_luong;
        // $product->ngay_nhap = $request->ngay_nhap;
        // $product->mo_ta = $request->mo_ta;
        // $product->trang_thai = $request->trang_thai;
        // //xử lý hình ảnh
        // if($request->hasFile('hinh_anh')){
        //     $imagePath=$request->file('hinh_anh')->store('images/products','public');
        //     $product->hinh_anh =$imagePath;
        // }
        // // lưu sản phẩm
        // $product->save();

        //validate
        $dataValidate = $request->validate([
            'ma_san_pham' => 'required|string|max:20|unique:products,ma_san_pham',
            'ten_san_pham' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'hinh_anh' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'gia' => 'required|numeric|min:0|max:9999999',
            'gia_khuyen_mai' => 'nullable|numeric|min:0|lt:gia',
            'so_luong' => 'required|integer|min:1',
            'ngay_nhap' => 'required|date',
            'mo_ta' => 'nullable|string',
            'trang_thai' => 'required|boolean',
        ]);
        //xử lý hình ảnh
        if ($request->hasFile('hinh_anh')) {
            $imagePath = $request->file('hinh_anh')->store('images/products', 'public');
            $dataValidate['hinh_anh'] = $imagePath;
        }
        Products::create($dataValidate);
        return redirect()->route('admin.products.index')->with('success', 'thêm sản phẩm thành công!');
    }
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        
        $product = Products::findOrFail($id);

        $dataValidate = $request->validate([
            'ma_san_pham' => 'required|string|max:20|unique:products,ma_san_pham,' . $id,
            'ten_san_pham' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'hinh_anh' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'gia' => 'required|numeric|min:0|max:9999999',
            'gia_khuyen_mai' => 'nullable|numeric|min:0|lt:gia',
            'so_luong' => 'required|integer|min:1',
            'ngay_nhap' => 'required|date',
            'mo_ta' => 'nullable|string',
            'trang_thai' => 'required|boolean',
        ]);
        //xử lý hình ảnh
        if ($request->hasFile('hinh_anh')) {
            $imagePath = $request->file('hinh_anh')->store('images/products', 'public');
            $dataValidate['hinh_anh'] = $imagePath;
            if ($product->hinh_anh) {
                Storage::disk('public')->delete($product->hinh_anh);
            }
        }
        $product->update($dataValidate);
        return redirect()->route('admin.products.index')->with('success', 'sửa sản phẩm thành công!');
    }
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        if ($product->hinh_anh) {
            Storage::disk('public')->delete($product->hinh_anh);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'xóa sản phẩm thành công!');
    }
    public function deleted()
    {
        $deletedProducts = Products::onlyTrashed()->paginate(10);
        $categories = Category::all();

        return view('admin.products.restore', compact('deletedProducts', 'categories'));
    }

    public function restore($id)
    {
        $product = Products::onlyTrashed()->findOrFail($id); // Chỉ lấy sản phẩm đã bị xóa mềm
        $product->restore(); // Khôi phục sản phẩm

        return redirect()->route('admin.products.index')->with('success', 'Khôi phục sản phẩm thành công!');
    }
}
