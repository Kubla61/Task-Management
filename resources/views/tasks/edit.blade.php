{{Form::open(array('route' => 'addTask'))}}
    <div>
        Task: {{Form::text('name', $task['name'])}}
    </div>

    <div>
        Description: {{Form::text('name', $task['description'])}}

    </div>

    <div>
        Status: {{Form::text('name', $task['status'])}}
    </div>
    <div>
        Assigneed to {{ $assignedTo->username }}
    </div>

    <a href="{{route('updateTask', $task['id'])}}">
        <button>
        Edit
        </button>
    </a>
{{Form::close()}}

    