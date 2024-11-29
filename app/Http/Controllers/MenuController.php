<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index(){
        $Menus = Menu::paginate(12);

        return view('menus.index', compact('Menus'));
       
    }

    public function create(){
        return view('menus.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());

        Menu::create([
            'name' => $request->name,
            'price' => str_replace(".", "", $request->price),
            'description'=>$request->description,
            'foto' => $foto->hashName(),
        ]);

        return redirect()->Route('menus.index')->with('Success', 'Add Menu Success');
    }

    public function edit(Menu $menu){
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $menu->name = $request->name;
        $menu->price = str_replace(".", "", $request->price);
        $menu->description = $request->description;

        if($request->file('foto')){
             
            Storage::disk('local')->delete('public/', $menu->foto);
            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $menu->foto = $foto->hashName();
        }

        $menu->update();
        return redirect()->Route('menus.index')->with('Success', 'Update Menu Success');
    }

    public function destroy(Menu $menu){
        if($menu->foto == "noimage.png"){
            Storage::disk('local')->delete('public/', $menu->foto);
        }

        $menu->delete();

        return redirect()->Route('menus.index')->with('Success', 'Delete Menu Success');
    }
}
