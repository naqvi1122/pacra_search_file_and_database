<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body   >
    <!-- <form action="">
        <label for="search"></label>
        <input type="text">
        
    </form> -->
    <form action="" class="col-5" >
      <div class="form-group">
        <br>
        <input style="position: absolute;left: 426px;width:30%"  value="{{$search}}" type="search" name="search"   id="" class="form-control"  placeholder="search" aria-describedby="helpId"  >
        <br>
      </div>
  </form>
  <br>
    
<table border=" 5px solid black"  class="table table-striped "> 
<thead class="thead-dark">    
                <tr>

                    <th>id</th>                  
                    <th>description</th>
                    <th>file</th>
                    <th>view</th>
                    <th>download</th>
                </tr>
                </thead>
                         @foreach($data as $t)
                         <td>{{$t->id }}</td>       
                         <td>{{$t->description}}</td> 
                         <td>{{$t->file}}</td> 
                         <td><a href="{{url('/view',$t->id)}}" target="_blank">view</a></td> 
                         <td><a href="{{url('/download',$t->file)}}">download</a></td> 
                         </tr>
@endforeach
</table>
</body>
</html>