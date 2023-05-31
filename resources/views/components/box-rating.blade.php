<div class="w3-card container">
    <div class="card-body p-2 row">

        <!-- Only show if $show is true -->
        @if($show)
        <a class="col-9 btn btn-light fw-bold fs-4 text-start" href="{{ url('library/request/'.$library_id) }}">
            {{$library_name}}
        </a>
        @endif

        <div class="text-end col-3">
            <button class="btn btn-light p-2" onclick="document.getElementById('alert-box-rating-{{$rating_id}}').hidden = false;">
                <img src="{{ url('icons/delete.png') }}" style="height:1.2rem" />
            </button>

            <!-- Only show if the user is not admin -->
            @if(!auth()->user()->is_admin)
            <a class="btn btn-light p-2" href="{{ url('user/rating/update/'.$library_id) }}">
                <img src="{{ url('icons/edit.png') }}" style="height:1.2rem" />
            </a>
            @endif
        </div>

        <div class="col-12">
            <hr class="hr"></hr>
        </div>


        <div class="col-12 text-end">
            @for($x = 0; $x < $rating; $x++)
                <img src="{{ asset('icons/star_solid.png') }}" style="height:1.2rem" />
                @endfor
                @for($x = $rating; $x < 5; $x++)
                <img src="{{ asset('icons/star.png') }}" style="height:1.2rem" />
            @endfor
        </div>

        <div class="col-12 d-flex justify-content-between mb-3">

            @if(isset($comment))
            <div class="fs-5 ms-1">"{{$comment}}"</div>
            @endif

            <div>
            <div class="fs-5 fw-light text-end">
                ({{ $rating }}/5)
            </div>
            </div>
        </div>

        <div class="col-12 text-end d-flex justify-content-between  content-align-end">
            <div class="mb-2 ">
                <img class="rounded-circle" src=" {{url('profile_pic/'.$picture.'.png')}} " style="height:30px;" />
                <div class="fw-bold ms-2 d-inline">by {{$username}}</div>
            </div>
            <div class="fw-light pt-3">
                {{$date}}
            </div>
        </div>



    </div>
</div>

<!-- alert-box -->
<div id="alert-box-rating-{{$rating_id}}" class="solas-alert-bg" hidden>
    <div class="w3-display-container w3-display-middle">
        <div class="w3-card p-3 mb-3 solas-confirmation bg-white">

            <div class="text-center mb-2">
                <b>Are you sure? This this change is permenant</b>.
            </div>


                    <div class="text-end">
                        <button class="btn btn-outline-dark" onclick="document.getElementById('alert-box-rating-{{$rating_id}}').hidden = true;">
                            No
                        </button>
                        <form method="POST" action="{{ url('user/rating/delete') }}" class="d-inline">
                            @csrf
                            <input type="hidden" name="rating_id" value="{{ $rating_id }}">
                            <input type="hidden" name="goto" value=" {{ url('user/'.$account_id) }} ">
                            <input type="hidden" name="library_id" value="{{ $library_id }}">
                            <button type="submit" class="btn btn-primary">
                                Yes
                            </button>
                        </form>
                    </div>


        </div>
    </div>
</div>
