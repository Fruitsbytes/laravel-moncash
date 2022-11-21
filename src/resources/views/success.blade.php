<div>
    @if( Session::has('mon-cash.success.message') )
        <p class="mon-cash-alert alert-success">{{ Session::get('mon-cash.success.message') }}</p>
    @endif
</div>
