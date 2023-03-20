<div class="card w3-card mt-3">
    <div class="card-body solas-padding">
        <div class="d-flex justify-content-between" style="padding-top:1.2rem;">                
            <div class="w3-cell w3-align">
                <h2><a style="text-decoration:none;"><b>{{$username}}</b></a></h2>
            </div>
            <div class="w3-cell w3-right-align">
                <button type="button" class="btn btn-danger" style="width:8rem;">Delete</button>
                <x-account-alert-box :account_id_new="$account_id" :username="$username" />
                <button type="button" class="btn btn-outline-dark" style="width:8rem;">Edit</button>
                <button type="button" class="btn btn-outline-dark" style="width:8rem;">Ratings</button>
            
            </div>
        </div>

        <div class="d-flex bd-highlight">
            <div class="w-100">
                {{$email}}
            </div>
        </div>
    </div>
</div>