@extends('layouts.app', ['activePage' => 'typography', 'titlePage' => __('Typography')])

@section('content')
@include('pages.wicpacnav');
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header  card-header-success">
            <h4 class="card-title ">wicpac search</h4>
            <p class="card-category"> The Search Results for Your Query  </p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                @php $n=1 @endphp
                @if (isset($info))
              <table class="table">
                <thead class=" text-primary">
                     <th>No</th>
                    <th>Entity</th>
                    <th>Industry</th>
                    <th>Rating Type</th>
                    <th>Action</th>
                    <th>CRA</th>
                </thead>
                <tbody>

                    @foreach($info as $info )
                    <td>{{ $n++ }}</td>
                    <td>{{$info['name'] }}</td>
                    <td>{{$info['og_main_sectors']['title'] }}</td>
                    <td>{{$info['og_ratings']['og_rating_scale']['title'] }}</td>
                    <td>{{$info['og_ratings']['og_action']['title'] }}</td>
                    <td>{{ 'PACRA' }}</td>

                    </tr>
@endforeach
                </tbody>

              </table>
            </div>
        </div>
      </div>
    </div>
    @endif
{{-- 2nd table --}}
@if (isset($info))
<div class="col-md-12">
    <div class="card">
      <div class="card-header  card-header-success">
        <h4 class="card-title ">wicpac search</h4>
        <p class="card-category"> The Search Results for Your Query  </p>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            @php $n=1 @endphp
            {{-- @if (isset($info)) --}}
          <table class="table">
            <thead class=" text-primary">
                 <th>No</th>
                <th>Entity</th>
                <th>status</th>
                <th>CRA</th>
            </thead>
            <tbody>

                @foreach($z as $z )
                <td>{{$n++}}</td>
                <td>{{$z['name']}}</td>
                <td><b>Not Initiated</b></td>
                <td>{{ 'PACRA' }}</td>


                </tr>
        @endforeach


            </tbody>

          </table>




{{-- end 2nd table --}}


            </div>
          </div>
        </div>
      </div>





      @endif

       {{-- 3rd table --}}
       @if (isset($third_table))
       <div class="col-md-12">
        <div class="card">
          <div class="card-header  card-header-success">
            <h4 class="card-title ">wicpac search</h4>
            <p class="card-category"> The Search Results for Your Query  </p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                @php $n=1 @endphp
                {{-- @if (isset($third_table)) --}}
              <table class="table">
                <thead class=" text-primary">
                     <th>No</th>
                    <th>Entity</th>
                    <th>Industry</th>
                    <th>Rating Type</th>
                    <th>Action</th>
                    <th>CRA</th>
                </thead>
                <tbody>

                    @foreach ($third_table as $third_table)
                    <td>{{$n++}}</td>
                    <td>{{$third_table['og_companies']['name']}}</td>
                    <td>{{$third_table['og_companies']['og_main_sectors']['title']}}</td>
                    <td>{{$third_table['og_rating_scale']['title']}}</td>
                    <td>{{$third_table['og_action']['title']}}</td>
                    <td>{{ 'VIS' }}</td>

                </tr>
                @endforeach
                </tbody>

              </table>

        {{--end  3rd table --}}
    </div>
</div>
</div>
</div>





@endif

@endsection
