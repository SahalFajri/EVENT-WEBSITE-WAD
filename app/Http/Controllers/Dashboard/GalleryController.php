<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        
        return view('dashboard.gallery.index', compact('galleries'));
    }

    public function create()
    {
        
        return view('dashboard.gallery.create');
    }
     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:10000',
            'image_alt' => 'required|string'
        ]);
        $imagePath = $request->file('image')->store('gallery', 'public');

        $validatedData['image'] = $imagePath;

        Gallery::create($validatedData);
        return redirect()->route('dashboard.gallery.index')->with('success', 'gallery berhasil ditambahkan');
    }
    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view('dashboard.gallery.show', compact('gallery'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('dashboard.gallery.edit', compact('gallery'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(request $request, Gallery $gallery)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:png,jpg|max:2048',
            'image_alt' => 'required|string'
        ]);

        if ($request->hasFile('image')){
            if($gallery->image){
                Storage::disk('public')->delete($gallery->image);
            }
            $validatedData['image'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update($validatedData);

        return redirect()->route('dashboard.gallery.index')->with('success', 'gallery Berhasil Diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if($gallery->image){
                Storage::disk('public')->delete($gallery->image);
            }

        $gallery ->delete();

        return redirect()->route('dashboard.gallery.index')->with('success', 'Gallery Berhasil dihapus');
    }

    public function download_pdf()
    {
        $galleries = Gallery::latest()->get();
        $pdf = Pdf::loadView('dashboard.gallery.pdf', compact('galleries'));
        return $pdf->stream('gallery.pdf');
    }
}
