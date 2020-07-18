@extends('layouts.app')

@section('title','商品詳細')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css">
    <link href="{{ asset('css/swiper.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('common.header')
    <div class="container">
        <div class="row justify-content-center m-1 p-5 min-vh-100">
            <div class="col-12 text-center h2">{{ $item->item_name }}</div>
            <div class="col-4">
                <div class="swiper-container swiper1">
                    <div class="swiper-wrapper">
                    @foreach($images as $key => $image)
                        <div class="swiper-slide d-flex align-items-center justify-content-center"><img class="img-thumbnail" src="{{ asset('/storage/images/'.$image->image) }}"></div>
                    @endforeach
                    </div>
                    <div class="swiper-button-prev prev1"></div>
                    <div class="swiper-button-next next1"></div>
                </div>
                <div class="swiper-container swiper2">
                    <div class="swiper-wrapper">
                    <!-- 各スライド -->
                    @foreach($images as $key => $image)
                        <div class="swiper-slide d-flex align-items-center justify-content-center"><img class="img-thumbnail" src="{{ asset('/storage/images/'.$image->image) }}"></div>
                    @endforeach
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col-6">
                <table class="table table-bordered w-10">
                    <tr>
                        <th class="table-active">出品者</th>
                        <td class="d-flex align-items-center justify-content-center"><a href="" >{{ $item->user->name }}</a></td>
                    </tr>
                    <tr>
                        <th class="table-active">カテゴリー</th>
                        <td class="btn w-100" ><a href="">{{ $item->category_id }}</a> > <a href="">{{ $item->category_children_id }}</a> > <a href="">{{ $item->category_grand_children_id }}</a></td>
                    </tr>
                    <tr>
                        <th class="table-active">ブランド</th>
                        <td class="text-center">{{ $item->brand_name }}</td>
                    </tr>
                    <tr>
                        <th class="table-active">商品の状態</th>
                        <td class="text-center">{{ $item->condition }}</td>
                    </tr>
                    <tr>
                        <th class="table-active">配送料の負担</th>
                        <td class="text-center">{{ $item->shipping_fee_payer }}</td>
                    </tr>
                    <tr>
                        <th class="table-active">配送の方法</th>
                        <td class="text-center">{{ $item->brand_name }}</td>
                    </tr>
                    <tr>
                        <th class="table-active">配送元地域</th>
                        <td class="text-center">{{ $item->prefecture_id }}</td>
                    </tr>
                    <tr>
                        <th class="table-active">発送日の目安</th>
                        <td class="text-center">{{ $item->shipping_days }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-12">
                <h1 class="text-center font-weight-bold my-3">¥{{ number_format($item->price) }}</h1>
                <button type="button" class="btn btn-primary btn-lg btn-block">購入画面へ進む</button>
            </div>
            <div class="col-12 text-center h4 my-5">{{ $item->description }}</div>
            <div class="col-12"></div>
            @auth
                <div class="card-body">
                    <form method="POST" action="">
                        <textarea name="comment" id="comment" class="w-100" cols="30" rows="10" style="min-height: 100px;"></textarea>
                        <button type="submit" class="btn btn-secondary btn-lg btn-block">コメントをする</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
    @include('common.footer')
@endsection

@section('script')
    <script src="{{ asset('js/swiper.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
@endsection