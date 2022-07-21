@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
@include('pages.filesearchnav');
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header  card-header-success">
            <h4 class="card-title ">FILE search Table</h4>
            <p class="card-category"> The Search Results for Your Query  </p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
            @if (isset($data))
              <table class="table">
                <thead class=" text-primary">
                     <th>id</th>
                    <th>description</th>
                    <th>file</th>
                    <th>view</th>
                    <th>download</th>
                </thead>
                <tbody>
                @foreach($data as $t)
                         <td>{{$t->id }}</td>
                         <td>{{$t->description}}</td>
                         <td>{{$t->file}}</td>
                         <td><a href="{{url('/view',$t->id)}}" target="_blank">view</a></td>
                         <td><a href="{{url('/download',$t->file)}}">download</a></td>
                         </tr>
@endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      @endif


@endsection
