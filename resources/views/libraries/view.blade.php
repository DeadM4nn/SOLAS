@extends("layouts.app2")
@section('content1')
    <div class="solas-description" style="margin-bottom:2rem;">
        {{$library->description}}
    </div>
    @php
        $name = $library->name." record";
        $link = "/library/delete";

        $star_avg = 3;

        if($bookmark){
            $bookmark_action = '/user/bookmark/remove';
            $bookmark_image = 'icons/bookmark_hover.png';
        }else{
            $bookmark_action = '/user/bookmark/add';
            $bookmark_image = 'icons/bookmark.png';
        }

    @endphp


    <div class="row my-4">

        <!-- Tags -->
        <div class="col-3 solas-library-column-title col-form-label align-items-center">License</div>
        <div class="col-9 align-items-center" style="display:inherit;margin-bottom: 0.7rem;">
            <x-widget-license :id="$library->library_id" />
        </div>

        @if(count($languages) != 0)
        <div class="col-3 solas-library-column-title col-form-label align-items-center">Language</div>
        
        <div class="col-9 align-items-center" style="display:inherit;margin-bottom: 0.7rem;">
            <x-widget-language :id="$library->library_id" />
        </div>
        @endif


    
    @if(count($tags) != 0)
        <div class="col-3 solas-library-column-title col-form-label align-items-center">Tags</div>
    
        <div class="col-9 align-items-center" style="display:inherit;margin-bottom: 0.7rem;">
            <x-widget-tag :id="$library->library_id" />
        </div>
    @endif


        <!-- Horizontal Divider -->
        <div class="col-12">
            <hr class="hr"></hr>
        </div>

    </div>
    @if(isset($library->command))
        <div class="row mb-4">
            <div class="col-3 solas-library-column-title col-form-label align-items-center">Install Command</div>
            <div class="col-9 align-items-center" style="">
                <div class="badge text-wrap solas-library-column-title" style="width:100%">
                    <input class="form-control solas-library-command" value="{{$library->command}}" readonly>
                </div>
            </div>
        </div>
    @endif

    @if(isset($library->link))
    <div class="row mb-4">
        <div class="col-3 solas-library-column-title col-form-label align-items-center">Source</div>
        <div class="col-9 align-items-center" style="">
            <div class="badge text-wrap solas-library-column-title" style="width:100%">
                <a class="btn btn-outline-dark solas-library-link" target="_blank" href="{{$library->link}}">{{$library->link}}</a>
            </div>
        </div>
    </div>
    @endif

    @if($library->is_file)
    <div class="row">
        <div class="col-3 solas-library-column-title col-form-label align-items-center">File</div>
        <div class="col-9 align-items-center" style="">
            <div class="badge text-wrap solas-library-column-title" style="width:100%; text-align:left;">
                <a href="{{ url('/downloads/'.$download) }}" class="btn btn-outline-dark shadow-sm" style="border: 1px solid #00000029;">Download ⭳
                </a>
            </div>
            <a class="text-muted p-3" href="{{ url('library/'.$library->library_id.'/downloads') }}">All Versions...</a>
        </div>
    </div>
    @endif

@if(isset($user_rating))
<!-- Horizontal Divider -->
<div class="col-12" style="margin-top:3rem;">
    <hr class="hr"></hr>
</div>
@endif

<div style="margin-top:2rem">

        @if(isset($user_rating))

            <div class="solas-title-3">
                Your Rating
            </div>

            <div class="card me-5 mb-3">
                <div class="card-body">
                    <div class="card-title mb-2 d-flex justify-content-between">


                            <div class="text-wrap text-break fw-bold fs-4" style="width: 60%">
                            <img src=" {{ url('profile_pic/'.$user_rating->picture.'.png') }} " class="rounded-circle me-3" style="height:40px;" /> {{$user_rating->username}}
                            </div>

                        <div>
                            <div>
                            @for($x = 0; $x < $user_rating->rating; $x++)
                                <img src="{{ asset('icons/star_solid.png') }}" style="height:1.5rem" />
                                @endfor
                                @for($x = $user_rating->rating; $x < 5; $x++)
                                <img src="{{ asset('icons/star.png') }}" style="height:1.5rem" />
                            @endfor
                            </div>
                            <h5 class="card-subtitle mb-1 mt-2 text-muted text-end">
                                {{$user_rating->rating}}/5
                            </h5>
                        </div>
                    </div>
                    @if($user_rating->comment != null)
                    <p class="card-text ps-5 pb-2">"{{$user_rating->comment}}"</p>
                    @endif
                </div>
                <div>
                </div>
                <div class="m-2 text-end">
                    <form method="POST" action="{{ url('user/rating/delete') }}" style="display:inline-block;">
                        @csrf
                        <input type="hidden" name="rating_id" value="{{ $user_rating->id }}">
                        <input type="hidden" name="library_id" value="{{ $library->library_id }}">
                        <button type="submit" class="btn btn-light p-2">
                            <img src="{{ url('icons/delete.png') }}" style="height:1rem" />
                        </button>
                    </form>


                    <button class="btn btn-light p-2" onclick="show_panel()">
                        <img src="{{ url('icons/edit.png') }}" style="height:1rem" />
                    </button>



                </div>
            </div>

        @endif

        @if(count($ratings) != 0)
        <div class="solas-title-3 mb-3">
            Ratings
        </div>
        @endif

        @foreach($ratings as $rating)
        <div class="card me-5 mb-3">
            <div class="card-body">
                <div class="card-title mb-2 d-flex justify-content-between">
                    <div class="text-wrap text-break fw-bold fs-4" style="width: 60%">
                        <img src=" {{ url('profile_pic/'.$rating->picture.'.png') }} " class="rounded-circle me-3" style="height:40px;" /> 
                        
                    @if(auth()->user() && auth()->user()->is_admin)    
                    <a class="btn btn-light" href="{{ url('user/view/'.$rating->account_id) }}">
                        <b>{{$rating->username}}</b>
                    </a>
                    @else
                        {{$rating->username}}
                    @endif
                    
                    
                    </div>
                    <div>
                        <div>
                        @for($x = 0; $x < $rating->rating; $x++)
                            <img src="{{ asset('icons/star_solid.png') }}" style="height:1.5rem" />
                            @endfor
                            @for($x = $rating->rating; $x < 5; $x++)
                            <img src="{{ asset('icons/star.png') }}" style="height:1.5rem" />
                        @endfor
                        </div>
                        <h5 class="card-subtitle mb-1 mt-2 text-muted text-end">
                            {{$rating->rating}}/5
                        </h5>
                    </div>
                </div>
                @if($rating->comment != null)
                <p class="card-text ps-5 pb-2">"{{$rating->comment}}"</p>
                @endif
            </div>
        </div>
    @endforeach
        
    </div>

@endsection
@section('page_title')
    <div class="d-flex justify-content-between">
        <div class="">
            {{$library->name}}
        </div>


        <div>
            @if(auth()->check())
            

            @if(auth()->user()->id == $library->creator_id || auth()->user()->is_admin)
            <a class="btn btn-light" href="{{ url('library/update/'.$library->library_id) }}">
                    <img style="height: 1.6rem;" src="{{ asset('icons/edit.png') }}">
            </a>
            <a class="btn btn-light" onClick="document.getElementById('alert-box-{{$library->library_id}}').style.visibility='visible';" class="me-3">
                    <img style="height: 1.6rem;" src="{{ asset('icons/delete.png') }}">
            </a>
            <x-alert-box :new-library-id="$library->library_id" :library-name="$name" :link="$link"/>
            @endif
                
                        
                <form style="display:inline-block;" action="{{ url($bookmark_action) }}" method="POST">
                    @csrf
                    <input type="hidden" name="library_id" id="library_id" value="{{$library->library_id}}">
                    <input class="btn btn-light" type="image" class="pt-1 solas-bookmark-icon" style="height:2.3rem;"

                    src="{{ asset($bookmark_image)  }}"
                    >
                </form>
                <div  style="display:inline-block; text-align: end;">
                    <x-button-comparison :id="$library->library_id" />
                </div>
            @endif
            

        </div>
    



    

    </div>
@endsection


@section("content2")

    <div class="mb-5 mt-4">
        @if(auth()->user() && !auth()->user()->is_admin)
            <x-ratings-panel :data="$library"/>
            <button class="btn btn-light" onclick="show_panel()">
        @endif


        @for($x = 0; $x < $avg_rating; $x++)
            <img src="{{ asset('icons/star_solid.png') }}" style="height:2.5rem" />
        @endfor
        @for($x = $avg_rating; $x < 5; $x++)
            <img src="{{ asset('icons/star.png') }}" style="height:2.5rem" />
        @endfor

        <div class="text-end mt-1 text-muted">
            {{$avg_rating_count}} Reviews
        </div>

        @if(auth()->user() && !auth()->user()->is_admin)
            </button> 
        @endif
    </div>


    <script>
        window.assetUrl = '{{ asset('') }}';
    </script>

    <script src="{{ asset('js/ratings.js') }}">
    </script>

    @if(isset($user_rating))
        <script>
            change_star({{ $user_rating->rating }});
        </script>
    @endif

    @if($show_update)
        <script>
            show_panel();
        </script>
    @endif

@endsection