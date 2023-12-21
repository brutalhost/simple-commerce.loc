@php use Illuminate\Support\Facades\Validator;use YiddisheKop\LaravelCommerce\Facades\Cart;use YiddisheKop\LaravelCommerce\Facades\Gateway; @endphp
@extends('layouts.app')
@section('title', 'Главная страница')

@section('content')
    @if($products->isEmpty())
        Пусто
    @else
        <div class="row row-cols-auto row-cols-md-3"></div>
        @foreach($products as $item)
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">{{ $item->title }}</h4>
                    <h6 class="text-muted card-subtitle mb-2">{{ $item->price }}</h6>
                    <form class="d-flex align-items-center justify-content-start flex-wrap"
                          action="{{ route('product.addToCart', ['product' => $item]) }}" method="POST">
                        @csrf
                        <a class="card-link me-2" href="{{ route('product', ['product' => $item]) }}">Подробнее</a>
                        <button class="btn btn-link" type="submit">Купить</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif

@endsection
