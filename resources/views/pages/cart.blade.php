@extends('layouts.app')
@section('title', 'Корзина')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            @include('partials.cart')
            @unless($items->isEmpty())
                <form class="d-inline" action="{{ route('cleanCart') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-primary" type="submit">Очистить корзину</button>
                </form>
            @endunless
        </div>

    </div>

    @unless($items->isEmpty())
        @include('partials.create-order')
    @endunless

@endsection
