@extends('layouts.app')

@section('title','FreeMa')

@section('css')
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('common.header')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4 mt-2">
                <div class="card mb50">
                    <div class="card-body">
                        <div class="image-wrapper"><img class="photo" src="">画像</div>
                        <p class="product-title">福袋</p>
                        <p class="product-title">2000円</p>
                        <a href="" class='btn btn-secondary detail-btn'>詳細を読む</a>
                    </div>
                </div>
            </div>
        

            <div class="col-md-4 mt-2">
                <div class="card mb50">
                    <div class="card-body">
                        <div class="image-wrapper"><img class="photo" src="">画像</div>
                        <p class="product-title">福袋</p>
                        <p class="product-title">2000円</p>
                        <a href="" class='btn btn-secondary detail-btn'>詳細を読む</a>
                    </div>
                </div>
            </div>
        
            <div class="col-md-4 mt-2">
                <div class="card mb50">
                    <div class="card-body">
                        <div class="image-wrapper"><img class="photo" src="">画像</div>
                        <p class="product-title">福袋</p>
                        <p class="product-title">2000円</p>
                        <a href="" class='btn btn-secondary detail-btn'>詳細を読む</a>
                    </div>
                </div>
            </div>
        
            <div class="col-md-4 mt-2">
                <div class="card mb50">
                    <div class="card-body">
                        <div class="image-wrapper"><img class="photo" src="">画像</div>
                        <p class="product-title">福袋</p>
                        <p class="product-title">2000円</p>
                        <a href="" class='btn btn-secondary detail-btn'>詳細を読む</a>
                    </div>
                </div>
            </div>
        
            <div class="col-md-4 mt-2">
                <div class="card mb50">
                    <div class="card-body">
                        <div class="image-wrapper"><img class="photo" src="">画像</div>
                        <p class="product-title">福袋</p>
                        <p class="product-title">2000円</p>
                        <a href="" class='btn btn-secondary detail-btn'>詳細を読む</a>
                    </div>
                </div>
            </div>
        
            <div class="col-md-4 mt-2">
                <div class="card mb50">
                    <div class="card-body">
                        <div class="image-wrapper"><img class="photo" src="">画像</div>
                        <p class="product-title">福袋</p>
                        <p class="product-title">2000円</p>
                        <a href="" class='btn btn-secondary detail-btn'>詳細を読む</a>
                    </div>
                </div>
            </div>
        
            <div class="col-md-4 mt-2">
                <div class="card mb50">
                    <div class="card-body">
                        <div class="image-wrapper"><img class="photo" src="">画像</div>
                        <p class="product-title">福袋</p>
                        <p class="product-title">2000円</p>
                        <a href="" class='btn btn-secondary detail-btn'>詳細を読む</a>
                    </div>
                </div>
            </div>
        
            <div class="col-md-4 mt-2">
                <div class="card mb50">
                    <div class="card-body">
                        <div class="image-wrapper"><img class="photo" src="">画像</div>
                        <p class="product-title">福袋</p>
                        <p class="product-title">2000円</p>
                        <a href="" class='btn btn-secondary detail-btn'>詳細を読む</a>
                    </div>
                </div>
            </div>
        
            <div class="col-md-4 mt-2">
                <div class="card mb50">
                    <div class="card-body">
                        <div class="image-wrapper"><img class="photo" src="">画像</div>
                        <p class="product-title">福袋</p>
                        <p class="product-title">2000円</p>
                        <a href="" class='btn btn-secondary detail-btn'>詳細を読む</a>
                    </div>
                </div>
            </div>
        



        </div>
    </div>
    {{-- $reviews->links() --}}
    @include('common.footer')
@endsection