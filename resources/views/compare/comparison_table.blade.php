@extends("layouts.app")
@section("page_title")
    <div class="d-flex justify-content-between">
        <div>Comparison table</div>
        <div>
            <a class="btn btn-outline-danger" href="{{ url('user/compare/clear') }}">Clear Table</a>
        </div>
    </div>
@endsection
@section("content")
<form class="m-3" method="POST" action="{{ url('user/compare/update') }}">
@csrf
<div style="overflow: auto;">
<table>
    <colgroup>
        @foreach($data as $curr_data)
            <col style="width: 400rem;">
        @endforeach
    </colgroup>
    <tr style="vertical-align: top;">
        @foreach($data as $curr_data)
            <td>
                <div class="d-flex justify-content-between">
                    <h5>{{ $curr_data->name }}</h5>
                    <div>
                        <form method="POST" action="{{ url('user/compare/delete') }}">
                            @csrf
                            <input type="hidden" name="compare_id" value="{{ $curr_data->id }}">
                            <button  class="btn btn-light me-2" type="submit">
                                <img src=" {{ asset('icons/delete.png') }} " style="height:1.6rem;">
                            </button>
                        </form>
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
                <div class="me-3 mb-3">
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
                <label for="notes" class=" form-label">notes</label>
                <textarea oninput="reveal_button()" name="notes[]" class="form-control">{{ $curr_data->note }}</textarea>
            </td>
        @endforeach
    </tr>
</table>
<div class="d-grid gap-2 mt-3">
    <button class="btn btn-primary" id="save_button" type="submit">Save</button>
</div>
</div>
</form>
<script src="{{ asset('js/button_compare.js') }}"></script>
@endsection


