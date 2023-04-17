<div class="solas-horizontal-display card w3-card mt-3">
    <div class="card-body solas-padding">

    @php
    $name = $name." record";
    $link = "/library/delete";
    @endphp

    <div class="w3-cell-row">
        
        <div class="w3-cell">
            <h2><a href="/library/request/{{$library_id}}" style="text-decoration:none;">{{$name}}<a/></h2>
        </div>

        <div class="w3-cell w3-right-align">
            <image class="solas-rating-card" src="{{ asset('placeholders/stars.png') }}">
            <!-- <form style="display:inline-block;" > -->
                @csrf
                <input type="hidden" name="library_id" id="library_id" value="{{$library_id}}">
                <input type="image" class="pt-1 solas-bookmark-icon"
                src="{{ asset('icons/bookmark.png') }}"
                >
            <!-- </form> -->
            
            <!-- <form style="display:inline-block;" > -->
                @csrf
                <input type="hidden" name="library_id" id="library_id" value="{{$library_id}}">
                <input type="image" class="pt-1 solas-bookmark-icon-activated"
                src="{{ asset('icons/bookmark_hover.png') }}"
                >
            <!-- </form> -->

            @if(auth()->check())
            @if(auth()->user()->id == $creator_id || auth()->user()->is_admin)
                <input class="trash-button" type="image" class="ml-5" src="{{ asset('icons/delete.png') }}" style="height: 2.3rem; top:1rem;   height: 2.3rem; position: relative; left: 0.5rem;"
                onClick="document.getElementById('alert-box-{{$library_id}}').style.visibility='visible';">
            @endif
            @endif

            <x-alert-box :new-library-id="$library_id" :library-name="$name" :link="$link"/>
        </div>
    </div>

        <div class="badge solas-tag solas-language solas-bg-language text-wrap">
            Dummy Language
        </div>

        <div class="badge solas-tag solas-language solas-bg-category text-wrap">
            Dummy Tag
        </div>

        <div class="badge solas-tag solas-language solas-bg-license text-wrap">
            Dummy License
        </div>

    
    
        <div class="d-flex bd-highlight">
            <div class="p-2 w-100"><p>
            
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
            
            <div class="p-2 flex-shrink-1">
                <div class="d-flex align-items-end" style="height:100%">
                    <button type="button" class="btn btn-outline-dark text-wrap" style="width: 6.5rem; ">Add to Comparison</button>       
                </div>
            </div>

        </div>
    </div>

</div>