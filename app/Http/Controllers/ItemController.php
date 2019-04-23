<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\Storage;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Item::all();
        $items = Item::paginate(15);

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
        ]);
        //$name = $request->input('name');
        //dd($name);

        Item::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_name')
        ]);

        $params = $request->validate([
            'image' => 'required|file|max:4000',
        ]);
        //dd($request->file('image'));
        $file = $params['image'];
        //dd($file);

        $image = \Image::make(file_get_contents($file->getRealPath()));
        //dd($image);
        $item_id = Item::all()->max('id');
        $image
            ->resize(300, 300)
            ->save(public_path().'/images/'.$item_id.'.jpg');
//

        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {

        $categories = Category::all()->pluck('name', 'id');
        return view('items.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item, Category $category)
    {
        $item->update([
            'name' => $request->input('name'),

            'category_id' => $request->input('category_name')
        ]);

//        $category->update([
//                'name' => $request->input('category_name'),
//        ]);

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index');

    }
     public function search(Request $request)
     {
        $keyword = $request->keyword;
        //dd($keyword);
        $query = Item::query();
        if(!empty($keyword))
        {
            $items = $query->where('name','LIKE','%'.$keyword.'%')->get();
        }

         return view('items.index', compact('items'));
     }
}
