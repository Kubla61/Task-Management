<div>
    Username: {{$user->username}}
</div>

<div>
    Email: {{$user->email}}
</div>

<div>
    Role: 

    @if($user['role'] == 0)
        User
    @elseif($user['role'] == 1)
        Moderator
    @elseif($user['role'] == 2)
        Admin
    @endif
</div>

<div>
    Created at: {{$user->created_at}}
</div>

<a href="{{route('editUser', $user['id'])}}">
    <button>
        Edit
    </button>
</a>

<a href="{{route('getUsers')}}">
    <button>
        Go Back
    </button>
</a>