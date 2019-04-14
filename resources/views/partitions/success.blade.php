<div class="container mt-2">
        @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
</div>
