<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $itemList = Item::all();
        return view('index', compact('itemList'));
    }

    public function create()
    {  
        return view('add');
    }

    public function store(Request $req)
    { 
        $validated = $req->validate([
            'name' => 'required|min:5|max:20',
            'description' => 'required|min:5|max:20',
            'price'=> 'required|numeric'
        ]);

        $pictureName = $req->file('picture')->getClientOriginalName();
        $req->file('picture')->storeAs('public/images/' . $pictureName);

        Item::create([
            'name' => $req->name,
            'description' => $req->description,
            'price' => $req->price,
            'picture' => $pictureName
        ]);
    
        return redirect('/');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('edit', compact('item'));
    }

    public function update(Request $req, $id)
    {
        $item = Item::findOrFail($id);
    
        if($req->file('picture')){
            $oldPicturePath = public_path() . '/storage/images/' . $item->picture;
            unlink($oldPicturePath);

            $pictureName = $req->file('picture')->getClientOriginalName();
            $req->file('picture')->storeAs('public/images/' . $pictureName);

            $item->update([
                'name' => $req->name,
                'description' => $req->description,
                'price' => $req->price,
                'picture' => $pictureName,
            ]);

            return redirect('/');
        }

        $item->update([
            'name' => $req->name,
            'description' => $req->description,
            'price' => $req->price,
        ]);

        return redirect('/');
    }
    
    public function delete($id)
    {
        $item = Item::findOrFail($id);
        return view('delete', compact('item'));
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        $deletedItemPath = public_path() . '/storage/images/' . $item->picture;
        unlink($deletedItemPath);

        Item::destroy($id);
        return redirect('/');
    }
}
