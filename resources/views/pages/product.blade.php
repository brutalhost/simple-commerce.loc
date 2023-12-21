@extends('layouts.app')
@section('title', $product->title)

@section('content')

    <table class="table">
        <tr>
            <th>Цена</th>
            <td>{{ $product->price }}</td>
        </tr>
        <tr>
            <th>Количество</th>
            <td>{{ $product->quantity }}</td>
        </tr>
        <tr>
            <th></th>
            <td>
                <form action="{{ route('product.addToCart', ['product' => $product]) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary" type="submit">Купить</button>
                </form>
            </td>
        </tr>
    </table>

{{--    <form action="{{ route('product.buy', ['product' => $product->slug()]) }}" method="POST">--}}
{{--        @csrf--}}
{{--        <button type="submit">Купить</button>--}}
{{--    </form>--}}
    <p>{{ $product->description }}</p>
@endsection
