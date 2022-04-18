<div>
    Task: {{$task['name']}}
</div>

<div>
    Description: {{$task['description']}}
</div>

<div>
    Status: 

    @if($task['status'] == 0)
        New
    @elseif($task['status'] == 1)
        In Progress
    @elseif($task['status'] == 2)
        On Review
    @elseif($task['status'] == 3)
        Completed
    @endif
</div>

<div>
    Assigneed to: {{$assignedTo}}
</div>

<div>
    Date of creation: {{$task['created_at']}}
</div>

<div>
    Date of last modification: {{$task['updated_at']}}
</div>

<a href="{{route('editTask', $task['id'])}}">
    <button>
        Edit
    </button>
</a>

<a href="{{route('getTasks')}}">
    <button>
        Go Back
    </button>
</a>
    