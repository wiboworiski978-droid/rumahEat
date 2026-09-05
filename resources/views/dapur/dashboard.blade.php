<h1>Dashboard Dapur</h1>

<p>Selamat datang, {{ auth()->user()->name }}</p>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>