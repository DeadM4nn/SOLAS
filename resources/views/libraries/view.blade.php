@extends("layouts.app2")
@section('content1')
    <div class="solas-description" style="margin-bottom:2rem;">
        {{$library->description}}
    </div>




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

@endsection
@section('page_title')
    <div class="d-flex justify-content-between">
        <div class="justify-content-start">
            {{$library->name}}
        </div>


        <div class="justify-content-end">
            @if(auth()->check())
            @if(auth()->user()->id == $library->creator_id || auth()->user()->is_admin)
            <a class="me-3" href="{{ url('library/update/'.$library->library_id) }}">
                    <img style="height: 1.6rem;" src="{{ asset('icons/edit.png') }}">
            </a>
            @endif

                        
                <form style="display:inline-block;" action="{{ url('/user/bookmark/add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="library_id" id="library_id" value="{{$library->library_id}}">
                    <input type="image" class="pt-1 solas-bookmark-icon" style="height:1.7rem;"
                    src="{{ asset('placeholders/bookmark.png') }}"
                    >
                </form>
            @endif
            

        </div>


    </div>
@endsection