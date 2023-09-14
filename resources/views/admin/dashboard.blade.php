<h1>olá {{ auth()->user()->name }}</h1>

<a href="{{ route('login.form') }}">
<button>
    Logout
</button>
</a>