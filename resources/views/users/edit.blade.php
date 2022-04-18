@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{Form::open(array('route' => array('updateUser', $user['id']), 'method' => 'put'))}}
    <div>
        Username: {{Form::text('username', $user['username'])}}
    </div>

    <div>
        Email: {{Form::text('email', $user['email'])}}
    </div>

    <div>
        Password: {{Form::password('password')}}
    </div>

    <div>
        Role:
        <select name="role">
            <option value="0" {{($user['role'] == 0) ? 'selected' : ''}}>User</option>
            <option value="1" {{($user['role'] == 1) ? 'selected' : ''}}>Moderator</option>
            <option value="2" {{($user['role'] == 2) ? 'selected' : ''}}>Admin</option>
        </select>
    </div>

    {{Form::submit('Save')}}
{{Form::close()}}

<a href="{{route('getSingleUser', $user['id'])}}">
    <button>
        Cancel
    </button>
</a>

    