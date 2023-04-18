@php
    if(isset($update_data)==1){
        $action = url('user/rating/update');
        $title_addon = "Update Rating";
        $button_message = "Update";
        $rating_id = $update_data->id;
    } else {
        $action = url('user/rating/add');
        $title_addon = "Rate";
        $button_message = "Submit";
        $rating_id = -1;
    }

@endphp
<div id="solas-ratings-panel" class="solas-alert-bg">
    <div class="w3-display-container w3-display-middle">
        <div class="w3-card p-3 mb-3 solas-confirmation  bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <div class="solas-title-3">
                    {{$title_addon}} {{$library_name}}
                </div>
                <div class="d-flex">
                    <button class="btn btn-light" onclick="hide_panel()">
                        <img src="{{ url('icons/x.png') }}" style="height:1rem" />
                    </button>
                </div>
            </div>

            <div class="mt-3 mb-1 d-flex justify-content-center">
                <!-- Star #1 -->
                <button class="btn btn-light" onclick="change_star(1)">
                    <img id="rating-star-1" src="{{ asset('icons/star.png') }}" style="height:2.5rem" />
                    <img id="rating-star-1-solid" src="{{ asset('icons/star_solid.png') }}" style="height:2.5rem" />
                </button>

                <!-- Star #2 -->
                <button class="btn btn-light" onclick="change_star(2)">
                    <img id="rating-star-2" src="{{ asset('icons/star.png') }}" style="height:2.5rem" />
                    <img id="rating-star-2-solid" src="{{ asset('icons/star_solid.png') }}" style="height:2.5rem" />
                </button>

                <!-- Star #3 -->
                <button class="btn btn-light" onclick="change_star(3)">
                    <img id="rating-star-3" src="{{ asset('icons/star.png') }}" style="height:2.5rem" />
                    <img id="rating-star-3-solid" src="{{ asset('icons/star_solid.png') }}" style="height:2.5rem" />
                </button>
            
                <!-- Star #4 -->
                <button class="btn btn-light" onclick="change_star(4)">
                    <img id="rating-star-4" src="{{ asset('icons/star.png') }}" style="height:2.5rem" />
                    <img id="rating-star-4-solid" src="{{ asset('icons/star_solid.png') }}" style="height:2.5rem" />
                </button>

                <!-- Star #5 -->
                <button class="btn btn-light" onclick="change_star(5)">
                    <img id="rating-star-5" src="{{ asset('icons/star.png') }}" style="height:2.5rem" />
                    <img id="rating-star-5-solid" src="{{ asset('icons/star_solid.png') }}" style="height:2.5rem" />
                </button>
            </div>

            <div class="text-center mb-4 fs-2 fw-light">
            (<div style="display:contents;" id="rate-value">?</div>/5)
            </div>

            <p class="card-text">
                <form method="POST" action="{{ $action }}">
                    @csrf
                    <label for="comment" class="fs-5 fw-normal form-label">Comment (Optional)</label>
                    <textarea class="form-control mb-4" name="comment" id="comment" placeholder="e.g. This library is great!">@if(isset($update_data)==1){{$update_data->comment}}@endif</textarea>
                    <input type="hidden" name="library_id" value="{{$library_id}}">
                    <input type="hidden" id="rating" name="rating" value=0>
                    <input type="hidden" id="rating_id" name="rating_id" value="{{$rating_id}}">
                    <input class="btn btn-primary " type="submit" value="{{$button_message}}" style="width:100%">
                </form>
            </p>
        </div>
    </div>

    


</div>
