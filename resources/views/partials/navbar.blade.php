<nav class="navbar navbar-expand-md bg-primary py-3" data-bs-theme="dark">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">{{ config('app.name') }}</a><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-4"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div id="navcol-4" class="collapse navbar-collapse flex-grow-0 order-md-first">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Главная</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('cart') }}">Корзина</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('orders') }}">Заказы</a></li>
            </ul>
            <div class="d-md-none my-2"><button class="btn btn-light me-2" type="button">Button</button><button class="btn btn-primary" type="button">Button</button></div>
        </div>
        <div class="d-none d-md-block"><button class="btn btn-light me-2" type="button">Button</button><a class="btn btn-primary" role="button" href="#">Button</a></div>
    </div>
</nav>
