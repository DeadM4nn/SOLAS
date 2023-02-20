@extends('layouts.app')
@section('page_title')
All Downloads - {{$library->name}}
@endsection
@section('content')
<div class="d-flex justify-content-between mb-3">
    <a class="justify-content-start btn btn-outline-primary">
        < Back
    </a>
    <a class="justify-content-end btn btn-primary">
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
    <tr>
        <th scope="row">12/3/12</th>
        <td>2.0.2</td>
        <td>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
        <td>
            <div style="text-align:right;">        
                <a href="{{ url('storage/uploads/3.rar') }}" class="btn btn-outline-dark shadow-sm" style="border: 1px solid #00000029;" download>Download 2.0.2 ⭳</a>
            </div>
        </td>
    </tr>
  </tbody>
</table>
@endsection