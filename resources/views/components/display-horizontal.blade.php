<div class="card w3-card mt-3">
    <div class="card-body solas-padding">
        @php
        $name = $name." record";
        $link = "/library/delete";
        @endphp
        <div class="d-flex justify-content-between">
            <div >
                <a class="btn btn-light mb-1" href="/library/request/{{$library_id}}" style="text-decoration:none;"><h2>{{$name}}</h2></a>
            </div>
            <x-widget-star :id="$library_id" />
        </div>
        <div>
            <x-widget-language :id="$library_id" />

            <x-widget-tag :id="$library_id" />

            <x-widget-license :id="$library_id" />
        </div>
        <div class="fw-light text-start mb-2">
            <div class="me-2 d-inline"><img src="{{ asset('icons/views.png') }}" style="height:1.2rem;"> {{ $views }} </img> views </div> | 
            <div class="ms-2 d-inline">{{ $last_updated }}</div>
        </div>
        <div>
            <div class="d-flex justify-content-between">
                <div class="me-3">
                <p>
                
                @php
                    $max_length = 350;

                    // Check the length of the variable
                    if(strlen($desc) > $max_length) {
                        // Truncate the variable to the maximum length
                        echo substr($desc, 0, $max_length)."...";
                    } else {
                        echo $desc;
                    }

                @endphp

                </p>
            </div>
            
            @if(auth()->user())
            <div class="d-flex align-items-end text-end mb-1">
                <x-button-comparison :id="$library_id" />
            </div>
            @endif

        </div>
    </div>


    </div>
</div>