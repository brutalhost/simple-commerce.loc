<h2>Заказ</h2>
<form class="d-inline" action="{{ route('order.pay', ['order' => session()->get('cart')]) }}" method="GET">
    @csrf
    <div class="mb-3">
        <select class="form-select" name="gateway" id="">
            @foreach(Gateway::gateways() as $item)
                <option value="{{ $item['class'] }}">{{ $item['name'] }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary" type="submit">Оплатить</button>
</form>
