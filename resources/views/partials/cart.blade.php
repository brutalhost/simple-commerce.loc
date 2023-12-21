<div class="table-responsive-sm">
    <table class="table">
        <thead>
        <tr>
            <th>Название</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Действия</th>
            <th>Итого</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <form action="{{ route('product.remove', ['product' => $item->model]) }}" method="POST">
                        @csrf
                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                </td>
                <td>
                    {{ $item->quantity * $item->price }}
                </td>
            </tr>
        @endforeach
        </tbody>

        <tfoot>
        <tr>
            <td colspan="4">Итого:</td>
            <td>{{ Cart::calculateTotals()['items_total'] }}</td>
        </tr>
        </tfoot>
    </table>
</div>
