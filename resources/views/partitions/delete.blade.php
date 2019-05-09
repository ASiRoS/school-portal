<form action="{{ $link }}" method="post" class="js-delete-form">
    @csrf
    @method('delete')
    <button class="btn btn-link" style="padding: 0;">@lang('messages.buttons.delete')</button>
</form>