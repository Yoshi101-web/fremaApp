<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Validator;
use App\Item;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ItemController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        // $items = Item::all();
        // $items = Item::query()->orderBy('created_at', 'desc')->paginate(9);
        if($request->has('keyword')){
            $items = Item::where('item_name', 'like', '%'.$keyword.'%')->orderBy('created_at', 'desc')->paginate(9);
        } else {
            $items = Item::query()->orderBy('created_at', 'desc')->paginate(9);
        }
        return view('top', compact('items', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Item $item, Image $image)
    {
        $latest = $item->orderBy('created_at', 'DESC')->first();
        // $item_id = 1+$latest->id;
        $item_id = 1+$latest->id;
        $images=array();
        $files = $request->file('files');
        foreach($files as $file) {
            $file_name = $file->getClientOriginalName();
            $path = $file->storeAs('images',$file_name);
            // $item->images->create(['image' => $path]);

            $item->images()->create(['image' => $path,'item_id' => $item_id]);
            // $data = (['image' => $path,'item_id' => $item_id]);

            // $data = (['image' => $path, 'item_id' => Auth::user()->id]);
            // $images[]=$data;
        }
        // Image::insert($images);
        // $item->images()->createMany($images);
        $item->item_name = $request->item_name;
        $item->description = $request->description;
        $item->user_id = Auth::user()->id;
        $item->category_id = $request->category_id;
        $item->category_children_id = $request->category_children_id;
        $item->category_grand_children_id = $request->category_grand_children_id;
        $item->brand_name = $request->brand_name;
        $item->price = $request->price;
        $item->size = $request->size;
        $item->condition = $request->condition;
        $item->shipping_fee_payer = $request->shipping_fee_payer;
        $item->prefecture_id = $request->prefecture_id;
        $item->shipping_days = $request->shipping_days;
        $item->save();
        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);

        return view('item.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
