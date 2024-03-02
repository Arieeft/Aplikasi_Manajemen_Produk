<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $posts = Post::latest()->paginate(5);

        //render view with posts
        return view('posts.index', compact('posts'));
    }
    
    public function create(): View
    {
        return view('posts.create');
    }

    public function store (Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',            
            'stock' => 'required',
            ]);

    $data=Post::create([
        'name' => $request->name,
        'desc' => $request->desc,
        'price' => $request->price,
        'stock' => $request->stock,
        ]);

    return redirect()->route('posts.index')
    ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);
        //render view with post
        return view('posts.show', compact('post'));
    }

    public function edit(string $id): View
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }
    

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name'  => 'required',
            'desc'  => 'required',
            'price' => 'required',            
            'stock' => 'required',
        ]);

        $post = Post::findOrFail($id);

            $post->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'price' => $request->price,
                'stock' => $request->stock,
            ]);
        
        return redirect()->route('posts.index')
        ->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $post = Post::findOrFail($id);
        Storage::delete('public/posts/'. $post->image);
        $post->delete();
        
        return redirect()->route('posts.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}