@extends('layouts.app')

@section('title','FreeMa')

@section('css')
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('common.header')
    <div class="container">
        <div class="row justify-content-center">
        @foreach($items as $item)
            <div class="col-md-4 mt-2">
                <div class="card mb50">
                    <div class="card-body">
                        <div class="image-wrapper"><img class="photo" src="{{ asset('images/dummy.png')}}"></div>{{-- asset('storage/images/'.$item->image) --}}
                        <p class="product-title">{{ $item->title }}</p>
                        <p class="product-price">{{ $item->price }}</p>
                        <a href="" class='btn btn-secondary detail-btn'>詳細を読む</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <div class="mt-4 row justify-content-center">
            {{ $items->links() }}
        </div>
    </div>
    @include('common.footer')
@endsection