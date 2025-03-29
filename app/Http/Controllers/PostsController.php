<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Reviews;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $posts = Posts::orderBy('created_at', 'DESC')->paginate(5); 
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $dataValidate = $request->validate([
            'tieu_de' => 'required|string|max:255|unique:posts,tieu_de',
            'bai_viet' => 'required|string',
            'tac_gia' => 'required|string|max:100',
            'trang_thai' => 'required|boolean',
        ]);

        Posts::create($dataValidate);
        return redirect()->route('admin.posts.index')->with('success', 'Thêm bài viết thành công!');
    }

    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Posts::findOrFail($id);

        $dataValidate = $request->validate([
            'tieu_de' => 'required|string|max:255|unique:posts,tieu_de,' . $id,
            'bai_viet' => 'required|string',
            'tac_gia' => 'required|string|max:100',
            'trang_thai' => 'required|boolean',
        ]);

        $post->update($dataValidate);
        return redirect()->route('admin.posts.index')->with('success', 'Sửa bài viết thành công!');
    }

    public function destroy($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Xóa bài viết thành công!');
    }

    public function deleted()
    {
        $deletedPosts = Posts::onlyTrashed()->paginate(10);
        return view('admin.posts.restore', compact('deletedPosts'));
    }

    public function restore($id)
    {
        $post = Posts::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->route('admin.posts.index')->with('success', 'Khôi phục bài viết thành công!');
    }
}
