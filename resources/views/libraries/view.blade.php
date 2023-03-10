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
                GNU Lesser General Public License (LPGL) 
            </div>
        </div>

        <div class="col-3 solas-library-column-title col-form-label align-items-center">Language</div>
        <div class="col-9 align-items-center" style="display:inherit;margin-bottom: 0.7rem;">
            <div class="badge solas-tag solas-bg-language text-wrap" style="font-size:0.7rem">
                Python
            </div>
            <div class="badge solas-tag solas-bg-language text-wrap" style="font-size:0.7rem">
                C++
            </div>
        </div>
        
        <div class="col-3 solas-library-column-title col-form-label align-items-center">Tags</div>
        <div class="col-9 align-items-center" style="display:inherit;margin-bottom: 0.7rem;">
            <div class="badge solas-tag solas-bg-category text-wrap" style="font-size:0.7rem">
                Machine Learning
            </div>
            <div class="badge solas-tag solas-bg-category text-wrap" style="font-size:0.7rem">
                Deep Learning
            </div>
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
                <a href="{{ url("library/download/latest/".$library->library_id) }}" class="btn btn-outline-dark shadow-sm" style="border: 1px solid #00000029;">Download ???
                </a>
            </div>
            <a class="text-muted p-3" href="{{ url("library/download/all/".$library->library_id) }}">All Versions...</a>
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
            <x-bookmark-button />
        </div>
    </div>
@endsection