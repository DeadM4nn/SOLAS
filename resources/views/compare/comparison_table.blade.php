@extends("layouts.app")
@section("page_title")
    <div class="d-flex justify-content-between">
        <div>Comparison table</div>
        <div>
            <button class="btn btn-outline-danger">Clear Table</button>
        </div>
    </div>
@endsection
@section("content")
<div style="overflow: auto;">
<table>
    <colgroup>
        @foreach($data as $curr_data)
            <col style="width: 400rem;">
        @endforeach
    </colgroup>
    <tr>
        @foreach($data as $curr_data)
            <td>
                <div class="d-flex justify-content-between">
                    <h5>{{ $curr_data->name }}</h5>
                    <button  class="btn btn-light me-2">
                        <img src=" {{ asset('icons/delete.png') }} " style="height:1.6rem;">
                    </button>
                </div>
            </td>
        @endforeach
    </tr>

    <tr>
        @foreach($data as $curr_data)
            <td><hr style="width:90%"></td>
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
            <td>
                <x-widget-tag />
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
                        <img class="me-3 " src="{{ asset('icons/yes.png') }}" style="height:1.5rem;">
                        Install Command
                    </div>
                    <div class="fw-bold mb-1">
                        <img class="me-3" src="{{ asset('icons/yes.png') }}" style="height:1.5rem;">
                        Source
                    </div>
                    <div class="fw-bold mb-1">
                        <img class="me-3" src="{{ asset('icons/no.png') }}" style="height:1.5rem;">
                        File
                    </div>
                </div>
            </td>
        @endforeach
    </tr>
    <tr>
        @foreach($data as $curr_data)
            <td>
                <form class=" m-3">
                    <label for="notes" class=" form-label">notes</label>
                    <textarea name="notes" class="form-control"></textarea>
                    <div class="d-grid gap-2 mt-3" >
                        <button class="btn btn-primary " type="submit">Save</button>
                    </div>
                </form>
            </td>
        @endforeach
    </tr>
</table>
</div>
@endsection

