{{Form::open(array('route' => 'addTask'))}}
    Title: {{Form::text('name')}}
    Description: {{Form::text('description')}}

    <select name="status">
        <option value="0">New</option>
        <option value="1">In Progress</option>
        <option value="2">On Review</option>
        <option value="3">Complete</option>
    </select>

    <select name="assignee">
        if(@isset($allUsers))
            @foreach($allUsers as $data)
                <option value="{{$data->id}}">{{$data->username}}</option>
            @endforeach
        @endif
    </select>

    {{Form::submit()}}
{{Form::close()}}