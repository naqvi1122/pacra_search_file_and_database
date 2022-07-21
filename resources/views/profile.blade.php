<h1>show</h1>
{{-- {{print_r($info)}} --}}
<table>
    <tr>
      <th>Company</th>
      <th>Company</th>
      <th>Company</th>
      <th>Company</th>
      <th>Company</th>

    </tr>
    @foreach ($info as $info )


    <tr>
        <td>{{$info['id'] }}</td>
        <td>{{$info['name'] }}</td>
        <td>{{$info['og_ratings']['og_action']['title'] }}</td>
        <td>{{$info['og_main_sectors']['title'] }}</td>
        <td>{{$info['og_ratings']['og_rating_scale']['title'] }}</td>








    </tr>
    @endforeach

  </table>


