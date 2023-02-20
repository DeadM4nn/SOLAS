@extends('layouts.app')
@section('page_title')
All Downloads - {{$library->name}}
@endsection
@section('content')
<div class="d-flex justify-content-between mb-3">
    <a class="justify-content-start btn btn-outline-primary">
        < Back
    </a>
    <a class="justify-content-end btn btn-primary" href="{{ url('library/update/'.$library->library_id) }}#upload">
        Upload ＋
    </a>
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
                <a href="{{ url('/downloads/{filename}'.$result->version_id.'.rar') }}" class="btn btn-outline-dark shadow-sm" style="border: 1px solid #00000029;" download>Download 2.0.2 ⭳</a>
            </div>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection