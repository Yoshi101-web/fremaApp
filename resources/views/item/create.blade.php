@extends('layouts.app')

@section('title', '出品詳細')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 p-4 center-block">
            <a href="/" class="btn">
                <p class="center-block">FreMa</p>
            </a>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <p class="text-center font-weight-bold h1 mb-0 py-3">出品</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('item.store') }}" enctype="multipart/form-data">
                        @csrf
                        <uploader-component></uploader-component>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('common.footer')
@endsection