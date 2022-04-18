<div>
    <div>
        <a href="/">
            <button>
                Home
            </button>
        </a>
        
        <a href="{{route('addUser')}}">
            <button>
                Create New User
            </button>
        </a>
    </div>

    @foreach($allUsers as $data)
        ---------------------
        <div>
            Username: {{$data->username}}
        </div>

        <div>
            Email: {{$data->email}}
        </div>

        <div>
            Role: 

            @if($data->role == 0)
                User
            @elseif($data->role == 1)
                Moderator
            @elseif($data->role == 2)
                Admin
            @endif
        </div>

        <div>
            <a href="{{route('getSingleUser', $data['id'])}}">
                <button>
                    View User
                </button>
            </a> 

            <a href="{{route('editUser', $data['id'])}}">
                <button>
                    Edit
                </button>
            </a>
        </div>

        {{Form::open(array('route' => array('deleteUser', $data['id']), 'method' => 'delete'))}}
            {{Form::submit('Delete')}}
        {{Form::close()}}
    @endforeach
</div>