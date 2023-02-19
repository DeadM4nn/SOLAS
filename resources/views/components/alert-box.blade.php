<div id="alert-box-{{$library_id}}" class="solas-alert-bg" style="visibility:hidden;">
    <div class="w3-display-container w3-display-middle">
        <div class="w3-card p-3 mb-3 solas-confirmation bg-white">
            <div>
                Are you sure? This will permanently delete the <b>{{$name}}</b> record.
            </div>
            <p class="card-text">
                <form method="POST" action="{{ url('library/delete') }}"  style="text-align:right;">
                    @csrf
                    <input type="hidden" name="library_id" value="{{$library_id}}">
                    <a class="btn btn-outline-dark" role="button" aria-pressed="true" 
                        onClick="document.getElementById('alert-box-{{$library_id}}').style.visibility='hidden';">
                        No
                    </a>
                    <input class="btn btn-primary solas-confirmation-button" type="submit" value="Yes">
                </form>
            </p>
        </div>
    </div>
</div>

