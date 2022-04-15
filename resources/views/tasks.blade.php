<div class="" style="display:flex;">
    <div>
        New <br>
        @foreach($tasksNew as $data) 
            -----------------------------
            <div>
                Task: {{ $data['name'] }}
            </div> 
            <div>
                Description: {{ $data['description'] }}
            </div> 
            <div>
                Assigneed To: {{ $data['assignee'] }}
            </div> 
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
            <div>
                Assigneed To: {{ $data['assignee'] }}
            </div> 
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
            <div>
                Assigneed To: {{ $data['assignee'] }}
            </div> 
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
            <div>
                Assigneed To: {{ $data['assignee'] }}
            </div> 
        @endforeach
    </div>
</div>