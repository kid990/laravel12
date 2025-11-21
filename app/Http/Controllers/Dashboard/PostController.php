<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dashboard\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('dashboard.post.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('dashboard.post.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
        'title' => 'required|min:3',
        'slug' => 'required|min:3|unique:posts',
        'content' => 'required|min:10',
        'category_id' => 'required|exists:categories,id',
        'description' => 'required',
        'posted' => 'required|in:yes,no', // o 'boolean' si es true/false
        'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
    ]);

    // Guardar la imagen
    $imagePath = $request->file('image')->store('posts', 'public');

    // Crear el post
    Post::create([
        'title' => $request->title,
        'slug' => $request->slug,
        'content' => $request->input('content'),
        'category_id' => $request->category_id,
        'description' => $request->description,
        'posted' => $request->posted,
        'image' => $imagePath, 
    ]);
        return redirect()->route('posts.index')->with('success','Post creado exitosamente');
    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view('dashboard.post.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
      
        $categories=Category::all();
        return view('dashboard.post.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required|min:3',
        'slug' => 'required|min:3|unique:posts,slug,' . $post->id,
        'content' => 'required',
        'category_id' => 'required|exists:categories,id',
        'description' => 'required',
        'posted' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
    ]);

    // Obtener todos los datos excepto la imagen
    $data = $request->only(['title', 'slug', 'content', 'category_id', 'description', 'posted']);

    // Manejar la imagen solo si se subió una nueva
    if ($request->hasFile('image')) {
        // Eliminar imagen anterior si existe
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }
        // Guardar nueva imagen
        $data['image'] = $request->file('image')->store('posts', 'public');
    }

    $post->update($data);
    
    return redirect()->route('posts.index')->with('success', 'Post actualizado exitosamente');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post eliminado exitosamente');
    }
}
