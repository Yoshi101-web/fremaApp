@extends('layouts.app')

@section('title','FreeMa')

@section('css')
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
    <link href="{{ asset('css/create.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('common.header')
    <div class="container" style="position: relative">
        <div class="row flex-wrap min-vh-100">
        @foreach($items as $item)
            <div class="col-md-4 mt-2">
                <div class="card mb50">
                    <a href="{{ route('item.show', $item->id) }}" class="card-body btn">
                        @if(count($item->images) > 0)
                            @foreach($item->images as $key => $image)
                                @if ($key == 1)
                                    <div class="image-wrapper"><img class="img-thumbnail" src="{{ asset('/storage/images/'.$image->image) }}"></div> {{-- asset('storage/images/'.$item->image) --}}
                                @endif
                            @endforeach
                        @else
                            <div class="image-wrapper"><img class="img-thumbnail" src="images/dummy.png"></div> {{-- asset('storage/images/'.$item->image) --}}
                        @endif
                        <div class="justify-center align-center">
                            <p class="product-title m-auto">{{ $item->item_name }}</p>
                            <p class="product-price text-center m-auto pt-1 h4 font-weight-bold">¥{{ number_format($item->price) }}</p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
        </div>
        <div class="mt-4 row justify-content-center">
            {{ $items->appends(['keyword' => Request::get('keyword')])->links() }}
        </div>
    </div>
    <a href="{{ route('item.create') }}">
        <div class="post-btn ">
            <p class="post-btn__name">出品</p>
        </div>
        </a>
    @include('common.footer')
@endsection