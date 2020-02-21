<div class="card-header">
<div class="d-flex justify-content-between">
    <div>
        <img width="40px" height="40px" style="border-radius:50%" src="{{asset('/img/6.jpg')}}" alt="icon">
        <strong class="ml-2">{{$discussion->author->name}}</strong>
    </div>
    <div>
        @if(isset($discussion->slug))
            <a href="{{route('discussions.show',$discussion->slug)}}" class="btn btn-success btn-sm">
            View
            </a>
        @else
            <a href="{{route('discussions.index')}}" class="btn btn-success btn-sm">
            Back
            </a>
        @endif
    </div>
</div>
</div>