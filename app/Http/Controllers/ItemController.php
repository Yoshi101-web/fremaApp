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
    public function store(Request $request, Item $item)
    {
        $rules = [
            'item_name' => 'required|max:255',
            'description' => 'required|max:6000',
            'category_id' => 'required',
            'category_children_id' => 'required',
            'category_grand_children_id' => 'required',
            'price' => 'required|min:300|max:9999999',
            'condition' => 'required',
            'shipping_fee_payer' => 'required',
            'prefecture_id' => 'required',
            'shipping_days' => 'required',
        ];

        $messages = [
            'item_name.required' => '商品名を入力してください',
            'item_name.max' => '商品名を255文字以下で入力してください',
            'description.required' => '商品の説明を入力してください',
            'description.max' => '商品の説明を6000文字以下で入力してください',
            'category_id.required' => 'カテゴリーを選択してください',
            'category_children_id.required' => 'カテゴリーを選択してください',
            'category_grand_children_id.required' => 'カテゴリーを選択してください',
            'price.required' => '価格を入力してください' ,
            'price.min' => '価格を¥300以上で入力してください' ,
            'price.max' => '価格を¥9999999以下で入力してください' ,
            'condition.required' => '商品の状態を選択してください',
            'shipping_fee_payer.required' => '配送料の負担を選択してください',
            'prefecture_id.required' => '配送元の地域を選択してください',
            'shipping_days.required' => '発送までの日数を選択してください',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            // return redirect('item.create')->withErrors($validator)->withInput();
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $latest = $item->orderBy('created_at', 'DESC')->first(); //最新のitemを取得
        $item_id = 1+$latest->id; ////最新のitemのidに１プラス。
        $images=array();  //からの配列を用意

        $files = $request->file('files'); //files[]を取得(複数)
        foreach($files as $file) {
            $file_name = $file->getClientOriginalName();
            $path = $file->storeAs('public/images',$file_name);
            $data = (['image' => $path,'item_id' => $item_id]);
            $images[]=$data;
        }
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
        Image::insert($images); //imageテーブルにinsert
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
