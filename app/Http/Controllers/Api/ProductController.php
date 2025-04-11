<?php

namespace App\Http\Controllers\Api;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Products::with('category');

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
        // return response()->json($products,200); //hiển thị full
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
       $product = Products::create($dataValidate);
        return response()->json([
            'data' => new ProductResource($product),
            'status' => 201,
            'message' => 'Product created successfully',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          // lấy ra dữ liệu chi tiết theo id
          $product = Products::with('category')->findOrFail($id);
          // đổ dữ liệu thông tin chi tiết ra giao diện
        //   return response()->json($product,200);
        //   return response()->json([
        //     'data'=>$product,
        //     'status'=>200,
        //     'message'=>'success',
        //     'author'=>'Nguyễn Văn A'
        // ]);
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
        return response()->json([
            'data' => new ProductResource($product),
            'status' => 200,
            'message' => 'Product updated successfully',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::findOrFail($id);
        if ($product->hinh_anh) {
            Storage::disk('public')->delete($product->hinh_anh);
        }
        $product->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Product deleted successfully',
        ], 200);
    }
}
