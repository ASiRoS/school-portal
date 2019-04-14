<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{ route('home') }}">@lang('messages.main')</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('news.index') }}">@lang('messages.school.news')</a>
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
            <li class="nav-item">
                <a href="{{ route('announcements.index') }}" class="nav-link">@lang('messages.announcements')</a>
            </li>
            @guest()
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Авторизация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                </li>
            @else
                @if(auth()->user()->isAdmin())
                    <li class="nav-item"><a href="{{ route('admin.links') }}" class="nav-link">Управлять</a></li>
                @elseif(auth()->user()->isTeacher())
                    <li class="nav-item"><a href="{{ route('homeworks.teacher') }}">@lang('messages.homework')</a></li>
                @elseif(auth()->user()->isStudent())
                    <li class="nav-item"><a href="{{ route('homeworks.index') }}" class="nav-link">@lang('messages.homework')</a></li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">@lang('messages.logout')</a>
                </li>
            @endguest
            

        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ route('locale.change', ['locale' => 'ru']) }}" class="nav-link">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAE2SURBVHjaYvz69T8DAvz79w9CQVj/0MCffwwAAcQClObiAin6/x+okxHMgPCAbOb//5n+I4EXL74ABBALxGSwagTjPzbAyMgItAQggBg9Pf9nZPx//x7kjL9////9C2QAyf9//qCQQCQkxFhY+BEggFi2b/+nq8v46BEDSPQ3w+8//3//BqFfv9BJeXmQEwACCOSkP38YgHy4Bog0RN0vIOMXVOTPH6Cv/gEEEEgDxFKgHEgDXCmGDUAE1AAQQCybGZg1f/d8//XsH0jTn3+///z79RtE/v4NZfz68xfI/vOX+4/0ZoZFAAHE4gYMvD+3/v2+h91wCANo9Z+/jH9VxBkYAAKIBRg9TL//MEhKAuWAogxgZzGC2CCfgUggAoYdGAEVAwQQ41egu5AQAyoXTQoIAAIMAD+JZR7YOGEWAAAAAElFTkSuQmCC" title="Русский" alt="Русский">
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('locale.change', ['locale' => 'kg']) }}" class="nav-link">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAGQSURBVHjaYvzIgAD/YCQyA47+gAUBAnAYBikAwCAM8zDYo/2Vz9oX2uqKkIQcezPd6Q4jDRXicAHcAHr/VX0BxALW9v/fk6cgpUD0+zcD619G2d8MjL//Xfz978vv/79//fv1CyjOJCsLtAQggFj+gZT/R6hm/Mvi84vJ6A/D39+Mmr9+Lvj17+vv/2ANQARUDBBATCALQM6A2s6k8YtR+fefk7/+HP/FqPSLWfMXSPUvqCVADQABxATy35+/EAP+//rNKPr7P/Ov/y9+/X3+6x/jr/8yMCcB0R+gbxgAAghkw3+IF38Dzfj19+Evhq+//vP/YhD6+f/Lr39PfkJVAy0BOpiBASCAwH74/RtiAMOvX3/O/WbU/sVk8Pv/399/r/76vf/3/59gxwBd++cPUDFAAIE1QDwAddWvH7N+Men//v/j15+zv/99BIn8+/Mb5Oy/f4FOAgggiA1/GCUlGUGe/guUAzHugwNA8Dcj7x+Q2ZAw/PsX6CSAAGJ8Do7CfzASM3YhsQ6JZqCPAQIMAPbnVIL0Z19UAAAAAElFTkSuQmCC" title="Кыргызский" alt="Кыргызский">
                </a>
            </li>
        </ul>
    </div>
</nav>