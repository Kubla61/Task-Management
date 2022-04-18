<a href="/">
    <button>
        Home
    </button>
</a>
<br><br>

<div class="" style="display:flex;">
    <div>
        New  
        <a href="{{route('addForm', 0)}}">
            <button>Add Task</button>
        </a><br> 

        @foreach($tasksNew as $data) 
            -----------------------------
            <div>
                Task: {{ $data['name'] }}
            </div> 
            <div>
                Description: {{ $data['description'] }}
            </div> 

            @if($data['assignee'])
                <div>
                    Assigneed To: 

                    @foreach($allUsers as $usersData)
                        @if($usersData->id == $data['assignee'])
                            "{{ $usersData['username'] }}"
                        @endif
                    @endforeach
                </div>
            @else
                <div>
                    Assigneed to: "No one"
                </div>
            @endif

            <div>
                <a href="{{ route('getSingleTasks', $data['id']) }}">
                    <button>View Task</button>
                </a>

                <a href="{{ route('editTask', $data['id']) }}">
                    <button>Update</button>
                </a>

                {{Form::open(array('route' => array('deleteTask', $data['id']), 'method' => 'delete'))}}
                    {{Form::submit('Delete')}}
                {{Form::close()}}
            </div>
        @endforeach
    </div>

    <div>
        In Progress 
        <a href="{{route('addForm', 1)}}">
            <button>Add Task</button>
        </a><br> 

        @foreach($tasksInProgress as $data) 
            -----------------------------
            <div>
                Task: {{ $data['name'] }}
            </div> 
            <div>
                Description: {{ $data['description'] }}
            </div> 

            @if($data['assignee'])
                <div>
                    Assigneed To: 

                    @foreach($allUsers as $usersData)
                        @if($usersData->id == $data['assignee'])
                            "{{ $usersData['username'] }}"
                        @endif
                    @endforeach
                </div>
            @else
                <div>
                    Assigneed to: "Noone"
                </div>
            @endif

            <div>
                <a href="{{ route('getSingleTasks', $data['id']) }}">
                    <button>View Task</button>
                </a>
                <a href="{{ route('editTask', $data['id']) }}">
                    <button>Update</button>
                </a>

                {{Form::open(array('route' => array('deleteTask', $data['id']), 'method' => 'delete'))}}
                    {{Form::submit('Delete')}}
                {{Form::close()}}
            </div>
        @endforeach
    </div>

    <div>
        On Review 
        <a href="{{route('addForm', 2)}}">
            <button>Add Task</button>
        </a><br> 

        @foreach($tasksOnReview as $data) 
            -----------------------------
            <div>
                Task: {{ $data['name'] }}
            </div> 
            <div>
                Description: {{ $data['description'] }}
            </div> 

            @if($data['assignee'])
                <div>
                    Assigneed To: 

                    @foreach($allUsers as $usersData)
                        @if($usersData->id == $data['assignee'])
                            "{{ $usersData['username'] }}"
                        @endif
                    @endforeach
                </div>
            @else
                <div>
                    Assigneed to: "Noone"
                </div>
            @endif

            <div>
                <a href="{{ route('getSingleTasks', $data['id']) }}">
                    <button>View Task</button>
                </a>

                <a href="{{ route('editTask', $data['id']) }}">
                    <button>Update</button>
                </a>

                {{Form::open(array('route' => array('deleteTask', $data['id']), 'method' => 'delete'))}}
                    {{Form::submit('Delete')}}
                {{Form::close()}}
            </div>
        @endforeach
    </div>

    <div>
        Completed
        <a href="{{route('addForm', 3)}}">
            <button>Add Task</button>
        </a><br> 

        @foreach($tasksCompleted as $data) 
            -----------------------------
            <div>
                Task: {{ $data['name'] }}
            </div> 
            <div>
                Description: {{ $data['description'] }}
            </div> 

            @if($data['assignee'])
                <div>
                    Assigneed To: 

                    @foreach($allUsers as $usersData)
                        @if($usersData->id == $data['assignee'])
                            "{{ $usersData['username'] }}"
                        @endif
                    @endforeach
                </div>
            @else
                <div>
                    Assigneed to: "Noone"
                </div>
            @endif

            <div>
                <a href="{{ route('getSingleTasks', $data['id']) }}">
                    <button>View Task</button>
                </a>

                <a href="{{ route('editTask', $data['id']) }}">
                    <button>Update</button>
                </a>

                {{Form::open(array('route' => array('deleteTask', $data['id']), 'method' => 'delete'))}}
                    {{Form::submit('Delete')}}
                {{Form::close()}}
            </div>
        @endforeach
    </div>
</div>