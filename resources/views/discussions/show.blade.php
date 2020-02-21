@extends('layouts.app')

@section('content')

        <div class="card my-5 bg-dark" style="color:#fff">
                 @include('partials.discussion-header')

                <div class="card-body">
                    <div class="text-uppercase text-center">
                        <strong>{{$discussion->title}}</strong>
                    </div>
                    <hr>

                    {{$discussion->content}} <br/>
                    @if($discussion->bestReply)
                        <div class="card bg-success my-5" style="color:#fff">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                <div>
                                    <img width="40px" height="40px" style="border-radius:50%" src="{{asset('/img/6.jpg')}}" alt="icon">
                                    <strong >{{$discussion->bestReply->owner->name}}</strong>
                                </div>
                                <div>
                                    BEST REPLY
                                </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {{$discussion->bestReply->content}}
                            </div>
                        </div>
                    @endif
                </div>
        </div>

        @foreach($discussion->replies()->latest()->simplePaginate(3) as $reply)
            <div class="card my-5 bg-dark" style="color:#fff">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <img width="40px" height="40px" style="border-radius:50%" src="{{asset('/img/6.jpg')}}" alt="icon">
                            <strong class="ml-2">{{$reply->owner->name}}</strong>
                        </div>
                        <div>
                        @auth
                            @if(auth()->user()->id === $discussion->user_id)
                            <form action="{{route('discussions.best-reply',['discussion'=>$discussion->slug, 'reply'=>$reply->id])}}" method="post">
                            @csrf
                                 <button type="submit" class="btn btn-sm btn-info">Mark as best reply</button>
                            </form>
                            @endif
                        @endauth
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{$reply->content}}

                </div>
            </div>
        @endforeach
        {{$discussion->replies()->latest()->simplePaginate(3)->links()}}

        @auth
        <div class="card">
            <div class="card-header">Add a reply</div>
            <div class="card-body">
                
                    <form action="{{route('replies.store',$discussion->slug)}}" method="post">
                    @csrf
                        <div class="form-group">
                        <label for="content">Content</label>
                        <!-- <input id="content" type="hidden" name="content">
                        <trix-editor input="content"></trix-editor> -->
                        <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-sm btn-success">Add reply</button>
                    </form>
              
            </div>
        </div>
        @else
            <a href="{{route('login')}}" class="btn btn-info">Sign in to add reply</a>
        @endauth

@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
@endsection