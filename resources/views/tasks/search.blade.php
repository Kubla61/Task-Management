@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<a href="/">
    <button>
        Home
    </button>
</a>

<a href="{{route('search')}}">
    <button>
        Clear All
    </button>
</a>

{{Form::open(array('route' => 'searchResult'))}}
    <div>
        Status: 

        <select name="status">
            <option value="4" @if(isset($status)) {{$status == 4 ? "selected" : ""}} @endif>None</option>
            <option value="0" @if(isset($status)) {{$status == 0 ? "selected" : ""}} @endif >New</option>
            <option value="1" @if(isset($status)) {{$status == 1 ? "selected" : ""}} @endif >In Progress</option>
            <option value="2" @if(isset($status)) {{$status == 2 ? "selected" : ""}} @endif >On Review</option>
            <option value="3" @if(isset($status)) {{$status == 3 ? "selected" : ""}} @endif >Complete</option>
        </select>
    </div>

    <div>
        Assigne to:

        <select name="assignee">
            <option value="0">None</option>
            @foreach($allUsers as $data)
                <option value="{{$data->id}}" @if(isset($assignee)) {{$assignee->id == $data->id ? "selected" : ""}} @endif>{{$data->username}}</option>
            @endforeach
        </select>
    </div>

    {{Form::submit()}}
{{Form::close()}}


@if(isset($tasks))
    @if(!$tasks->isEmpty())
        @foreach($tasks as $data)
            <div>
                Task: {{ $data['name'] }}
            </div> 

            <div>
                Description: {{ $data['description'] }}
            </div> 

            <div>
                Status: 

                @if($data['status'] == 0)
                    New
                @elseif($data['status'] == 1)
                    In Progress
                @elseif($data['status'] == 2)
                    On Review
                @elseif($data['status'] == 3)
                    Completed
                @endif
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
            ----------------------
        @endforeach
    @else
        There isn't any record with this parameters.
    @endif
@endif