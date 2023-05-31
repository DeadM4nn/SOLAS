@extends('layouts.app')
@section('page_title')
All Downloads - {{$library->name}}
@endsection
@section('content')
<div class="d-flex justify-content-between mb-3">
    <a class="justify-content-start btn btn-outline-primary" href="{{ url('library/request/'.$library->library_id) }}">
        < Back
    </a>

    @if(auth()->user() && auth()->user()->id == $library->creator_id)
    <a class="justify-content-end btn btn-primary" href="{{ url('library/update/'.$library->library_id) }}#upload">
        Upload ＋
    </a>
    @endif

</div>
<table class="table">
  <thead>
    <tr>
        <th scope="col">Uploaded On</th>
        <th scope="col">Version</th>
        <th scope="col">Description</th>
        <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($results as $result)
    <tr>
        <th scope="row">
            {{$result->created_at}}
        </th>

        <td>{{$result->version_number}}</td>
        <td>{{$result->description}}</td>
        <td>
            <div style="text-align:right;">        
                <a href="{{ url('/downloads/'.$result->version_id) }}" class="btn btn-outline-dark shadow-sm" style="border: 1px solid #00000029;" download>Download {{$result->version_number}} ⭳</a>
            </div>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection