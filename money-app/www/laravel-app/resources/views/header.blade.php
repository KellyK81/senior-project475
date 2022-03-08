<div @if (Route::currentRouteName() == 'home') id="homepage" @endif class = "navlinks">
    @if (Route::currentRouteName() != 'home')
        <a id="lnkHome" href="/">Home</a>
    @endif
    @if (Session::get('authenticated'))
        &nbsp;|&nbsp;<a id="lnkLogout" href="/logout">Log Out</a>
    @else
        @if (Route::currentRouteName() != 'login' && Route::currentRouteName() != 'home')
            &nbsp;|&nbsp;<a id="lnkLogin" href="/login">Log In <i class="glyphicon glyphicon-log-in"></i></a>
        @endif
    @endif
</div>