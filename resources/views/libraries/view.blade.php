@extends("layouts.app2")
@section('content1')
    <div class="solas-description" style="margin-bottom:2rem;">
        {{$library->description}}
    </div>

    @php
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
            <div class="badge solas-tag solas-bg-license solas-bg-license text-wrap" style="font-size:0.7rem">
                {{$license}}
            </div>
        </div>
        <div class="col-3 solas-library-column-title col-form-label align-items-center">Language</div>
        <div class="col-9 align-items-center" style="display:inherit;margin-bottom: 0.7rem;">
        @foreach($languages as $language)    
        <div class="badge solas-tag solas-bg-language text-wrap" style="font-size:0.7rem">
                {{$language["name"]}}
        </div>
        @endforeach
        </div>
        
        <div class="col-3 solas-library-column-title col-form-label align-items-center">Tags</div>
        <div class="col-9 align-items-center" style="display:inherit;margin-bottom: 0.7rem;">
    @foreach( $tags as $tag)
            <div class="badge solas-tag solas-bg-category text-wrap" style="font-size:0.7rem">
                {{$tag['name']}}
            </div>
    @endforeach
        </div>

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
                <a target="_blank" href="{{ url('/downloads/'.$download) }}" class="btn btn-outline-dark shadow-sm" style="border: 1px solid #00000029;" download>Download ⭳
                </a>
            </div>
            <a class="text-muted p-3" href="{{ url('library/'.$library->library_id.'/downloads') }}">All Versions...</a>
        </div>
    </div>
    @endif

<!-- Horizontal Divider -->
<div class="col-12" style="margin-top:3rem;">
    <hr class="hr"></hr>
</div>

<div style="margin-top:2rem">

        @if(isset($user_rating))

            <div class="solas-title-3">
                Your Rating
            </div>

            <div class="card me-5 mb-3"  onclick="show_panel()">
                <div class="card-body">
                    <div class="card-title mb-2 d-flex justify-content-between">
                        <div class="text-wrap text-break fw-bold fs-4" style="width: 60%">
                            {{$user_rating->username}}
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
                            <h5 class="card-subtitle mb-2 mt-2 text-muted text-end">
                                {{$user_rating->rating}}/5
                            </h5>
                        </div>
                    </div>
                    <p class="card-text ps-5 pb-2">"{{$user_rating->comment}}"</p>
                </div>
            </div>

        @endif

        <div class="solas-title-3 mb-3">
            Ratings
        </div>

        @foreach($ratings as $rating)
        <div class="card me-5 mb-3">
            <div class="card-body">
                <div class="card-title mb-2 d-flex justify-content-between">
                    <div class="text-wrap text-break fw-bold fs-4" style="width: 60%">
                        {{$rating->username}}
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
                <p class="card-text ps-5 pb-2">"{{$rating->comment}}"</p>
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


        <div class="justify-content-end">
            @if(auth()->check())
            @if(auth()->user()->id == $library->creator_id || auth()->user()->is_admin)
            <a class="me-3" href="{{ url('library/update/'.$library->library_id) }}">
                    <img style="height: 1.6rem;" src="{{ asset('icons/edit.png') }}">
            </a>
            @endif

                        
                <form style="display:inline-block;" action="{{ url($bookmark_action) }}" method="POST">
                    @csrf
                    <input type="hidden" name="library_id" id="library_id" value="{{$library->library_id}}">
                    <input type="image" class="pt-1 solas-bookmark-icon" style="height:1.7rem;"

                    src="{{ asset($bookmark_image)  }}"
                    >
                </form>
            @endif
            

        </div>

    <x-ratings-panel :data="$library" />

    </div>
@endsection
@section("content2")

    <div class="mb-5 mt-4">
        <button class="btn btn-light" onclick="show_panel()">
            @for($x = 0; $x < $avg_rating; $x++)
            <img src="{{ asset('icons/star_solid.png') }}" style="height:2.5rem" />
            @endfor
            @for($x = $avg_rating; $x < 5; $x++)
            <img src="{{ asset('icons/star.png') }}" style="height:2.5rem" />
            @endfor

            <div class="text-end mt-1 text-muted">
                {{$avg_rating_count}} Reviews
            </div>
        </button>
    </div>


    <script>
        window.assetUrl = '{{ asset('') }}';
    </script>
    <script src="{{ asset('js/ratings.js') }}"></script>
@endsection