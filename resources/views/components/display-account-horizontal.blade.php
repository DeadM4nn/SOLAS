<div class="card w3-card mt-3">
    <div class="card-body solas-padding">
        <div class="d-flex justify-content-between" style="padding-top:1.2rem;">                
            <div class="w3-cell w3-align">
                <h2 style="display: inline;"><b>{{$username}}                 
                </b></h2>
                @if($is_admin)
                    <div class="badge solas-tag solas-language bg-success text-wrap" style="width: 6rem;">
                        Admin
                    </div>
                @endif         
            </div>

            <div class="w3-cell w3-right-align">
                <button type="button" class="btn btn-danger" style="width:8rem;"
                @if($is_admin)
                    disabled
                @endif
                onClick="document.getElementById('alert-box-{{$account_id}}').style.visibility='visible';"
                >Delete</button>
                <x-account-alert-box :username="$username" :account_id='$account_id'  />
                <button type="button" class="btn btn-success" style="width:8rem;" 
                @if($is_admin)
                    disabled
                @endif
                >Edit</button>
                @if(!$is_admin)
                <button type="button" class="btn btn-outline-dark" style="width:8rem;">Ratings</button>
                @endif
            </div>
        </div>

        <div class="d-flex bd-highlight">
            <div class="w-100">
                {{$email}}
            </div>
        </div>
    </div>
</div>