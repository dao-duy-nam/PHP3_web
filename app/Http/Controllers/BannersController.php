<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller
{
    public function index()
    {
        $banners = Banners::paginate(10); // Đúng, hỗ trợ phân trang
        return view('admin.banners.index', compact('banners'));
    }
    public function create()
    {
        return view('admin.banners.create');
    }
   
    public function store(Request $request)
    {
      
        $dataValidate = $request->validate([
            'title' =>'required|string',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif',
            'link'=>'required|string',
        ]);
         //xử lý hình ảnh
        if($request->hasFile('image')){
            $imagePath=$request->file('image')->store('images/products','public');
            $dataValidate['image']=$imagePath;
        }
        Banners::create($dataValidate);
        return redirect()->route('admin.banners.index')->with('success','thêm banner thành công!');
    }
    public function edit($id){
        $banners = Banners::findOrFail($id);
        return view('admin.banners.edit', compact('banners'));
    }
    public function update(Request $request,$id){
        $banners = Banners::findOrFail($id);

        $dataValidate = $request->validate([
            'title' =>'required|string',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif',
            'link'=>'required|string',
        ]);
         //xử lý hình ảnh
        if($request->hasFile('image')){
            $imagePath=$request->file('image')->store('images/products','public');
            $dataValidate['image']=$imagePath;
            if($banners->image){
                Storage::disk('public')->delete($banners->image);
            }
        }
        $banners->update($dataValidate);
        return redirect()->route('admin.banners.index')->with('success','sửa thành công!');
    }
    public function destroy($id){
        $banners = Banners::findOrFail($id);
        if($banners->image){
            Storage::disk('public')->delete($banners->image);
        }
        $banners->delete();
        return redirect()->route('admin.banners.index')->with('success','xóa banner thành công!');
    }
}
