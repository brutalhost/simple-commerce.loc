@extends('layouts.app')
@section('title', 'Все заказы')

@php
    $completedOrder = request()->get('completed-order');
    function checkCompleted($status, $itemId, $completedOrder) {
        return ($status === 'completed') && ($completedOrder == $itemId);
    }
@endphp

@section('content')
    <div class="table-responsive-sm">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                {{--<th>User ID</th>--}}
                <th>Status</th>
                <th>Paid at</th>
                <th>Items</th>
                <th>Total</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
            @unless($orders->isEmpty())
                @foreach($orders as $orderItem)
                    <tr id="order-{{ $orderItem->id }}"
                        @class(['table-success' => checkCompleted($orderItem->status, $orderItem->id, $completedOrder), 'table-secondary' => $completedOrder == $orderItem->id])>
                        <td>{{ $orderItem->id }}</td>
                        {{--<td>{{ $orderItem->user_id }}</td>--}}
                        <td class="{{ ($orderItem->status === 'completed' ? 'fw-bold' : '') }}">{{ $orderItem->status }}</td>
                        <td>{{ $orderItem->paid_at ? $orderItem->paid_at->diffForHumans() : '' }}</td>
                        <td>
                            <ul>
                                @foreach($orderItem->items()->get() as $cartItem)
                                    <li>{{ $cartItem->quantity.' x '.$cartItem->title.' - '.$cartItem->price }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $orderItem->grand_total }}</td>
                        <td>{{ $orderItem->created_at->diffForHumans() }}</td>
                        <td>{{ $orderItem->updated_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            @else
                <tr>Ничего</tr>
            @endunless
            </tbody>
        </table>
    </div>
@endsection
