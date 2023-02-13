<div class="card w3-card mt-3">
    <div class="card-body solas-padding">
        

    <div class="w3-cell-row">
        
        <div class="w3-cell">
            <h2>{{$name}}</h2>
        </div>

        <div class="w3-cell w3-right-align">
            <image class="solas-rating-card" src="{{ asset('placeholders/stars.png') }}">
            <image src="{{ asset('placeholders/bookmark.png') }}" style="height: 1.6rem;">
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
            <div class="p-2 w-100"><p>{{$desc}}</p>
            </div>
            
            <div class="p-2 flex-shrink-1">
                <div class="d-flex align-items-end" style="height:100%">
                    <button type="button" class="btn btn-outline-dark text-wrap" style="width: 6.5rem; ">Add to Comparison</button>       
                </div>
            </div>

        </div>
    </div>
</div>