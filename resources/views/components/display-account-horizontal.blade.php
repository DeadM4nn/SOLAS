<div class="card w3-card mt-3">
    <div class="card-body solas-padding">

        <div class="d-flex justify-content-between" style="padding-top:1.2rem;">        
      
        <div class="d-flex flex-row"">
            <div>
                <img class="rounded-circle me-4" style="height:4.5rem;" src="{{ asset('profile_pic/' . $picture . '.png') }}" />
            </div>

            <div class="w3-cell w3-align">
                <div style="display:block-inline">
                <a class="btn btn-light" href="{{ url('user/view/'.$account_id) }}">
                    <b class="fs-4">{{$username}}</b>
                </a>
                
                @if($is_admin)
                    <div class="d-inline badge solas-tag solas-language bg-success text-wrap" style="width: 6rem;">
                        Admin
                    </div>
                @endif
                <div>
                    {{$email}}
                </div>
                </div>
            </div>

        </div>

            <div class="w3-cell w3-right-align">
            @if(!$is_admin)
                <button type="button" class="btn btn-danger" style="width:8rem;"
                onClick="document.getElementById('alert-box-{{$account_id}}').style.visibility='visible';"
                >Delete</button>
                <x-account-alert-box :username="$username" :account_id='$account_id'  />
                <a href="{{url('/admin/users/update/'.(string)$account_id)}}" type="button" class="btn btn-success" style="width:8rem;" 
                >Edit</a>
                @endif
            </div>
        </div>

    </div>
    <div class="text-end fw-light fs-7 pe-4  pb-2">
        {{$date_created}}
    </div>
</div>