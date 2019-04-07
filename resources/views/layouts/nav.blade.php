<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">@lang('messages.main')</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('news.index') }}">@lang('messages.school.news')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('homeworks.index') }}">@lang('messages.homework')</a>
            </li>
            <div class="dropdown show">
                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @lang('messages.library')
                </a>
                <div class="dropdown-menu" aria-label="dropdownMenuLink">
                    <a href="{{ route('books.index') }}" class="dropdown-item">@lang('messages.books')</a>
                    <a href="{{ route('links.index') }}" class="dropdown-item">@lang('messages.links')</a>
                </div>
            </div>
            <div class="dropdown show">
                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @lang('messages.school.school')
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('partners.index') }}">@lang('messages.partners')</a>
                    <a class="dropdown-item" href="{{ route('home.about') }}">@lang('messages.about')</a>
                    <a class="dropdown-item" href="{{ route('contacts.index') }}">@lang('messages.contacts')</a>
                    <a class="dropdown-item" href="{{ route('programs.index') }}">@lang('messages.school.program')</a>
                </div>
            </div>
            @guest()
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Авторизация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">@lang('messages.logout')</a>
                </li>
            @endguest
        </ul>
    </div>
</nav>