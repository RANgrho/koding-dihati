<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // =============================================================
        // Method untuk memanggil atau mengambil data dari database
        // Sekaligus membuat PAGINATION secara otomatis
        // Dan mengembalikan view ke post.index (/post/index.blade.php)
        // ==============================================================
        $posts = Post::latest()->paginate(5);
        return view ('post.index', compact('posts'));
    }

    /* public function welcome()
    {
        $posts = Post::all();
        return view ('welcome', ['posts' => $posts]);
    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // =============================================================================================
        // Method mengecek user ketika menekan tombol"buat postingan" sudah melakukan login atau belum
        // jika sudah akan dialihkan ke halaman post.create (/post/create.blade.php)
        // dan jika belum akan dialihkan ke halaman login
        // =============================================================================================
        $tags = Tag::all();

        if (Auth::check()) {
            return view('post.create', compact('tags'));
        }else{
            return view('auth.login');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ===============================================
        // validasi data yang akan dikirimkan ke database
        // ===============================================

        $this->validate($request, array(
            'title' => 'required|max:200',
            'context' => 'required',
            'author' => 'required',
            'tag' => 'required',
        ));

        // =========================================
        // validasi data ke dalam sebuah variabel
        // agar mudah dalam pemanggilannya
        // dan setelah dikirim akan akan langsung pindah ke halaman /post
        // =========================================

        $posts = new Post();
        $posts->title = $request->title;
        $posts->context = $request->context;
        $posts->author = $request->author;
        $posts->tag = $request->tag;

        $posts->save();

        return redirect('/post')->with('success', 'Post behasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // ===================================================
        // Menampilkan data berdasarkan data $id yang dipilih
        // dan data $id akan dikirimkan ke halaman post.show (/post/show.blade.php)
        // ===================================================

        $data = Post::FindOrFail($post->id);
        return view('post.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:200',
            'context' => 'required',
            'author' => 'required',
            'tag' => 'required',
        ]);

        $post->update($request->all());
        return redirect()->route('post.index');
/* 
        $posts = Post::FindOrFail($id);
        $posts->title = $request->get('title');
        $posts->context = $request->get('context');
        $posts->author = $request->get('author');
        $posts->save();

        return redirect('/post'); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }
}
