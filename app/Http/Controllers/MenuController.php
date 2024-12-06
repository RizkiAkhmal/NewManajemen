<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {

        $Menus = Menu::paginate(12);

        return view('menus.index', compact('Menus')); // Pass the variable 'menus' to the view

    }

    public function create()
    {
        $categories = Category::get();

        return view('menus.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg',
            'id_category' => 'required|exists:category,id', // Ensure category exists
        ]);

        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName()); // Store foto in public storage

        Menu::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'id_category' => $request->id_category,
            'foto' => $foto->hashName(), // Store the hashed filename
        ]);

        return redirect()->route('menus.index')->with('success', 'Menu created successfully!');
    }

    public function edit($id) {
        $menus =  Menu::findOrFail($id)->first();
        $categories = Category::get();

        return redirect()->route('menus.edit', compact('Menus', 'categories'));
    }

    public function update($id, Request $request)
{
    // Validate the incoming request data
    $this->validate($request, [
        'name' => 'required',
        'price' => 'required|numeric',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg', // Image is optional for updates
        'id_category' => 'required|exists:category,id', // Ensure the category exists
    ]);

    // Fetch the menu item
    $menu = Menu::findOrFail($id);

    // Handle image upload if a new image is provided
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());
        $menu->foto = $foto->hashName(); // Update the image path in the database
    }

    // Update other fields
    $menu->update([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'id_category' => $request->id_category,
    ]);

    return redirect()->route('menus.index')->with('success', 'Menu updated successfully!');
}

    public function delete($id) {
        Menu::findOrFail($id)->delete();

        return redirect()->route('menus.index');

}




}
