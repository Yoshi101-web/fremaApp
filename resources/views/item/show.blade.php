@extends('layouts.app')

@section('title','商品詳細')

@section('css')
    <link href="{{ asset('css/swiper.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('common.header')
    <div class="container">
        <div class="row justify-content-center m-1 p-5">
            <div class="col-4">
                <div class="swiper-container swiper1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                    </div>
                    <div class="swiper-button-prev prev1"></div>
                    <div class="swiper-button-next next1"></div>
                </div>
                <div class="swiper-container swiper2">
                    <div class="swiper-wrapper">
                        <!-- 各スライド -->
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                        <div class="swiper-slide"><img class="img-thumbnail" src="{{ asset('images/dummy.png') }}"></div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-6">
                <table class="table table-bordered w-10">
                    <tr>
                        <th class="table-active">出品者</th>
                        <td>ユーザー</td>
                    </tr>
                    <tr>
                        <th class="table-active">カテゴリー</th>
                        <td >レディース</td>
                    </tr>
                    <tr>
                        <th class="table-active">ブランド</th>
                        <td>Nike</td>
                    </tr>
                    <tr>
                        <th class="table-active">商品の状態</th>
                        <td>新品</td>
                    </tr>
                    <tr>
                        <th class="table-active">配送料の負担</th>
                        <td>送料込み</td>
                    </tr>
                    <tr>
                        <th class="table-active">配送の方法</th>
                        <td>送料込み</td>
                    </tr>
                    <tr>
                        <th class="table-active">配送元地域</th>
                        <td>送料込み</td>
                    </tr>
                    <tr>
                        <th class="table-active">発送日の目安</th>
                        <td>送料込み</td>
                    </tr>
                </table>
            </div>
            <div class="col-12">
            <h1 class="text-center font-weight-bold">¥{{ number_format(6000) }}</h1>
            購入画面
            </div>
        </div>
    </div>



    @include('common.footer')
@endsection