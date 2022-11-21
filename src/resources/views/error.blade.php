<div>
    @if( Session::has('mon-cash.error.message') )
        <p class="mon-cash-alert alert-error">{{ Session::get('mon-cash.error.message') }}</p>
    @endif
</div>

