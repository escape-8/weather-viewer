<div class="d-flex gap-4">
    <div class="align-self-center text-light">{{ Auth::user()->email }}</div>
    <form action="{{ route('user.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-light">Logout</button>
    </form>
</div>
