<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    public function index()
    {
        $merchandise = Merchandise::all();
        return view('admin.merchandise.index', compact('merchandise'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'description' => 'required',
        ]);

        $imagePath = $request->file('image')->store('merchandise', 'public');

        Merchandise::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.merchandise.index')->with('success', 'Merchandise created successfully!');
    }

    public function edit(Merchandise $merchandise)
    {
        return view('admin.merchandise.edit', compact('merchandise'));
    }

    public function update(Request $request, Merchandise $merchandise)
    {
        $request->validate([
            'name' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('merchandise', 'public');
            $merchandise->image = $imagePath;
        }

        $merchandise->update($request->only('name', 'stock', 'price', 'description'));

        return redirect()->route('admin.merchandise.index')->with('success', 'Merchandise updated successfully!');
    }

    public function destroy(Merchandise $merchandise)
    {
        $merchandise->delete();
        return redirect()->route('admin.merchandise.index')->with('success', 'Merchandise deleted successfully!');
    }
}
