<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ArticleExport;

class ArticleController extends Controller
{
    //
    public function index()
    {
        $articles = Article::latest()->get();

        return view('dashboard.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.article.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:png,jpg|max:2048',
            'content' => 'required|string',
        ]);
        $imagePath = $request->file('image')->store('article', 'public');

        $validatedData['user_id'] = $user->id;
        $validatedData['image'] = $imagePath;

        Article::create($validatedData);
        return redirect()->route('dashboard.article.index')->with('success', 'article berhasil ditambahkan');
    }
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('dashboard.article.show', compact('article'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('dashboard.article.edit', compact('article'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(request $request, Article $article)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'image' => 'image|mimes:png,jpg|max:2048',
            'content' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $validatedData['image'] = $request->file('image')->store('article', 'public');
        }

        $article->update($validatedData);

        return redirect()->route('dashboard.article.index')->with('success', 'Article Berhasil Diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('dashboard.article.index')->with('success', 'Article Berhasil dihapus');
    }

    public function export_excel()
    {
        return Excel::download(new ArticleExport, 'articles.xlsx');
    }
}
