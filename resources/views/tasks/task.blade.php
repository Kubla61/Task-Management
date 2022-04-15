<div>
    Task: {{ $task['name'] }}
</div>

<div>
    Description: {{ $task['description'] }}
</div>

<div>
    Status: {{ $task['status'] }}
</div>
<div>
    Assigneed to {{ $assignedTo->username }}
</div>

<a href="{{route('editTask', $task['id'])}}">
    <button>
    Edit
    </button>
</a>
    