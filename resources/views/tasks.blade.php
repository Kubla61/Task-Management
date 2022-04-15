<div class="" style="display:flex;">
    <div>
        New  
        <a href="/add">
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

            @foreach($allUsers as $usersData)
                @if($usersData->id == $data['assignee'])
                    <div>
                        Assigneed to: {{ $usersData['username'] }}
                    </div>
                @else
                    <div>
                        Assigneed to: Noone
                    </div>
                @endif
            @endforeach

            <a href="{{ route('getSingleTasks', $data['id']) }}">
                <button>View Task</button>
            </a><br> 

            {{Form::open(array('route' => array('deleteTask', $data['id']), 'method' => 'delete'))}}
                {{Form::submit('Delete')}}
            {{Form::close()}}
        @endforeach
    </div>

    <div>
        In Progress <br>
        @foreach($tasksInProgress as $data) 
            -----------------------------
            <div>
                Task: {{ $data['name'] }}
            </div> 
            <div>
                Description: {{ $data['description'] }}
            </div> 

            @foreach($allUsers as $usersData)
                @if($usersData->id == $data['assignee'])
                    <div>
                        Assigneed To: {{ $usersData['username'] }}
                    </div>
                @else
                    <div>
                        Assigneed to: Noone
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>

    <div>
        On Review <br>
        @foreach($tasksOnReview as $data) 
            -----------------------------
            <div>
                Task: {{ $data['name'] }}
            </div> 
            <div>
                Description: {{ $data['description'] }}
            </div> 

            @foreach($allUsers as $usersData)
                @if($usersData->id == $data['assignee'])
                    <div>
                        Assigneed To: {{ $usersData['username'] }}
                    </div>
                @else
                    <div>
                        Assigneed to: Noone
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>

    <div>
        Completed <br>
        @foreach($tasksCompleted as $data) 
            -----------------------------
            <div>
                Task: {{ $data['name'] }}
            </div> 
            <div>
                Description: {{ $data['description'] }}
            </div> 

            @foreach($allUsers as $usersData)
                @if($usersData->id == $data['assignee'])
                    <div>
                        Assigneed To: {{ $usersData['username'] }}
                    </div>
                @else
                    <div>
                        Assigneed to: Noone
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
</div>