<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Resources\ItemResource;

class ItemApiController extends Controller
{
    public function index()
    {
        $itemList = Item::all();
        return ItemResource::collection($itemList);
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return new ItemResource($item);
    }

    public function store(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|min:5|max:20',
            'description' => 'required|min:5|max:105',
            'price'=> 'required|numeric'
        ]);

        $pictureName = $req->file('picture')->getClientOriginalName();
        $req->file('picture')->storeAs('public/images/' . $pictureName);

        $item = Item::create([
            'name' => $req->name,
            'description' => $req->description,
            'price' => $req->price,
            'picture' => $pictureName
        ]);

        return new ItemResource($item);
    }

    public function update(Request $req, $id)
    {
        $item = Item::find($id);

        if(!$item){
            return response()->json('ID not found!');
        }

        $validated = $req->validate([
            'name' => 'required|min:5|max:20',
            'description' => 'required|min:5|max:105',
            'price'=> 'required|numeric'
        ]);
    
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
        }

        $item->update([
            'name' => $req->name,
            'description' => $req->description,
            'price' => $req->price,
        ]);
        
        return new ItemResource($item);
    }

    public function destroy($id)
    {
        $item = Item::find($id);

        if(!$item){
            return response()->json('ID not found!');
        }

        $deletedItemPath = public_path() . '/storage/images/' . $item->picture;
        unlink($deletedItemPath);

        Item::destroy($id);

        return response()->json('Delete Success!');
    }
}
