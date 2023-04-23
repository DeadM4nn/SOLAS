
@if($license)
        <form method="POST" action="{{ url('license/search') }}">
                @csrf
        <input name="license" type="hidden" value="{{$license}}">
        <button type="submit" class="badge btn btn-light solas-tag solas-bg-license solas-bg-license text-wrap" style="font-size:0.7rem">
                {{$license}}
        </button>
        </form>
@else
        <div class="badge solas-tag solas-bg-license solas-bg-license text-wrap" style="font-size:0.7rem">
        Unspecified
        </div>
@endif
