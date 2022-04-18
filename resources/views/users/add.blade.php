@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{Form::open(array('route' => 'createUser'))}}
    <div>
        Username: {{Form::text('username')}}
    </div>

    <div>
        Email: {{Form::email('email')}}
    </div>

    <div>
        Password: {{Form::text('password')}}
    </div>
    
    <div>
        Role: 

        <select name="role">
            <option value="0">User</option>
            <option value="1">Moderator</option>
            <option value="2">Admin</option>
        </select>
    </div>

    {{Form::submit()}}
{{Form::close()}}