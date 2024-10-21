<div class="box-message" style="{{ session('error') || session('success') ? '' : 'display: none' }}">
    @if (session('error'))
        <div class="alert alert-danger"><strong>{{session('error') }}</strong></div>
    @elseif(session('success'))
        <div class="alert alert-success"><strong>{{ session('success') }}</strong></div>
    @else
        <div class="alert"></div>
    @endif
</div>