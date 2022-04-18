@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{Form::open(array('route' => 'addTask'))}}
    <div>
        Title: {{Form::text('name')}}
    </div>

    <div>
        Description: {{Form::text('description')}}
    </div>
    
    <div>
        Status: 

        <select name="status">
            <option value="0" {{($status == 0) ? 'selected' : ''}}>New</option>
            <option value="1" {{($status == 1) ? 'selected' : ''}}>In Progress</option>
            <option value="2" {{($status == 2) ? 'selected' : ''}}>On Review</option>
            <option value="3" {{($status == 3) ? 'selected' : ''}}>Complete</option>
        </select>
    </div>

    <div>
        Assigne to:

        <select name="assignee">
            <option value="0">No one</option>
            @foreach($allUsers as $data)
                <option value="{{$data->id}}">{{$data->username}}</option>
            @endforeach
        </select>
    </div>

    {{Form::submit()}}
{{Form::close()}}