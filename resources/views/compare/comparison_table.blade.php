@extends("layouts.app")
@section("page_title")
    <div class="d-flex justify-content-between">
        <div>Comparison table</div>

        @if(count($data) > 0)
        <div>
            <a class="btn btn-outline-danger" href="{{ url('user/compare/clear') }}">Clear Table</a>
        </div>
        @endif

    </div>
@endsection
@section("content")
<form class="m-3" method="POST" action="{{ url('user/compare/update') }}">
@csrf
<div style="overflow: auto;">

@if(count($data) < 2)
<!-- For Laravel grid -->
<div class="container">
  <div class="row">
@endif

@if(count($data) != 0)
<table class="col">
    <colgroup>
        @foreach($data as $curr_data)
            <col style="width: 400rem;">
        @endforeach
    </colgroup>
    <tr style="vertical-align: top;">
        @foreach($data as $curr_data)
            <td>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-light" href="{{ url('library/request/'.$curr_data->library_id) }}">
                    <h5>{{ $curr_data->name }}</h5>
                    </a>
                    <div>
                        <a  class="btn btn-light me-2" href="{{ url('user/compare/delete/'.$curr_data->id) }}">
                            <img src=" {{ asset('icons/delete.png') }} " style="height:1.6rem;">
</a>
                    </div>
                </div>
            </td>
        @endforeach
    </tr>

    <tr>
        @foreach($data as $curr_data)
            <td><div class="text-center"><hr style="width:90%"></td></td>
        @endforeach
    </tr>
    <tr>
        @foreach($data as $curr_data)
            <td>
                <div class="me-3 mb-3 text-end">
                    <x-widget-star :id="$curr_data->library_id"  />
                </div>
            </td>
        @endforeach
    </tr>
    <tr>
        @foreach($data as $curr_data)
            <td style="vertical-align:top;">
                <x-widget-tag :id="$curr_data->library_id" />
            </td>
        @endforeach
    </tr>
    <tr>
        @foreach($data as $curr_data)
            <td style=" vertical-align: top;">
                <p style="text-align: justify;" class="p-3">{{ $curr_data->description }}</p>
            </td>
        @endforeach
    </tr>
    <tr>
        @foreach($data as $curr_data)
            <td style=" vertical-align: top;">
                <table>
                    <tr>
                        <td class="fw-bold mb-1 col col-lg-2" style=" vertical-align: top;"><div class="me-2">Language</div></td>
                        <td class="col"><x-widget-language :id="$curr_data->library_id" /></td>
                    </tr>
                </table>
            </td>
        @endforeach
    </tr>
    <tr>
        @foreach($data as $curr_data)
            <td style=" vertical-align: top;">
                <table class="mb-1">
                    <tr>
                        <td class="fw-bold mb-1 col col-lg-2" style=" vertical-align: top;"><div class="me-3">License</div></td>
                        <td><div class="me-3"><x-widget-license :id="$curr_data->library_id" /></td>
                    </tr>
                </table>
            </td>
        @endforeach
    </tr>
    <tr>
        @foreach($data as $curr_data)
            <td>
                <div class="w3-card m-4 p-2">
                    <div class="fw-bold mb-1">
                        @if(isset($curr_data->command))
                            <img class="me-3" src="{{ asset('icons/yes.png') }}" style="height:1.5rem;">
                        @else
                            <img class="me-3" src="{{ asset('icons/no.png') }}" style="height:1.5rem;">
                        @endif
                        Install Command
                    </div>
                    <div class="fw-bold mb-1">
                        
                        @if(isset($curr_data->link))
                            <img class="me-3" src="{{ asset('icons/yes.png') }}" style="height:1.5rem;">
                        @else
                            <img class="me-3" src="{{ asset('icons/no.png') }}" style="height:1.5rem;">
                        @endif
                        Source
                    </div>
                    <div class="fw-bold mb-1">
                        @if($curr_data->is_file == 1)
                            <img class="me-3" src="{{ asset('icons/yes.png') }}" style="height:1.5rem;">
                        @else
                            <img class="me-3" src="{{ asset('icons/no.png') }}" style="height:1.5rem;">
                        @endif
                        File
                    </div>
                </div>
            </td>
        @endforeach
    </tr>
    <tr>
        @foreach($data as $curr_data)
            <td class="m-3">
                <input type="hidden" name="compare_ids[]" value="{{ $curr_data->id }}">
                <label for="notes" class="form-label">Notes</label>
                <textarea 
placeholder="e.g.
- Point 1
- Point 2
"
                oninput="reveal_button()" name="notes[]" style="height: 100px;" class="form-control">{{ $curr_data->note }}</textarea>
            </td>
        @endforeach
    </tr>
</table>
@endif

@if(count($data) < 2)
<div class="col d-flex justify-content-center align-items-center">
    <div class="m-5">
        <img src="{{ url('images/add_more.png') }}" style="width:20%; margin-left:40%; opacity:50%">
        <div class="fw-bold text-center fs-3 text-secondary p-5" style="opacity:50%">
        @if(count($data)==1)
            Oh no! Comparing takes atleast 2 libraries. Please continue browsing and add 1 more library to compare.
        @elseif(count($data)==0)
            Oh no! Comparing takes atleast 2 libraries. Please continue browsing and add 2 more library to compare.
        @endif

        </div>
    </div>
</div>


<!-- For laravel Grid -->
</div>
</div>
@endif


<div class="d-grid gap-2 mt-3">
    <button class="btn btn-primary" id="save_button" type="submit">Save</button>
</div>
</div>
</form>
<script src="{{ asset('js/button_compare.js') }}"></script>
@endsection


