{{Form::open(array('route' => array('updateTask', $task['id']), 'method' => 'put'))}}
    <div>
        Task: {{Form::text('name', $task['name'])}}
    </div>

    <div>
        Description: {{Form::text('description', $task['description'])}}

    </div>

    <div>
        Status: {{-- Form::text('status', $task['status']) --}}
        <select name="status">
            <option value="0" {{($task['status'] == 0) ? 'selected' : ''}}>New</option>
            <option value="1" {{($task['status'] == 1) ? 'selected' : ''}}>In Progress</option>
            <option value="2" {{($task['status'] == 2) ? 'selected' : ''}}>On Review</option>
            <option value="3" {{($task['status'] == 3) ? 'selected' : ''}}>Completed</option>
        </select>
    </div>
    <div>
        Assigneed to: 
        <select name="assignee">
            <option value="0" {{($task['assignee'] == 0) ? 'selected' : ''}}>No one</option>

            @foreach($allUsers as $data)
                <option value="{{$data->id}}" {{($data->id == $task['assignee']) ? 'selected' : ''}}>{{$data->username}}</option>
            @endforeach
        </select>
    </div>

    {{Form::submit('Save')}}
    <a href="{{route('getSingleTasks', $task['id'])}}">
        <button>
            Cancel
        </button>
    </a>
{{Form::close()}}

    