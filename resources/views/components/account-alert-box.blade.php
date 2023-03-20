<div id="alert-box-{{$account_id}}" class="solas-alert-bg" style="visibility:hidden;">
    <div class="w3-display-container w3-display-middle">
        <div class="w3-card p-3 mb-3 solas-confirmation bg-white">
            <div style="text-align:center;">
                Are you sure? This will permanently delete the <b>{{$username}}</b> record.
            </div>
            <p class="card-text">
                <form method="POST" action="{{ url('admin/users/delete') }}"  style="text-align:right;">
                    @csrf
                    <input type="hidden" name="account_id" value="{{$account_id}}">
                    <a class="btn btn-outline-dark" role="button" aria-pressed="true" 
                        onClick="document.getElementById('alert-box-{{$account_id}}').style.visibility='hidden';">
                        No
                    </a>
                    <input class="btn btn-primary solas-confirmation-button" type="submit" value="Yes">
                </form>
            </p>
        </div>
    </div>
</div>

