<nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        @foreach($menus as $menu)
            <a class="py-2 d-none d-md-inline-block" href="{{ $menu->link }}">{{ $menu->title }}</a>
        @endforeach
    </div>
</nav>