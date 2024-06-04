<div class="align-self-center text-light">{{ Auth::user()->email }}</div>
<form class="mb-0" action="{{ route('user.logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-light">Logout</button>
</form>
