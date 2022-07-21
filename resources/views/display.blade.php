<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>           

      <a href="contact">
  <button style="position:absolute; right: 180px;" type="button" class="btn btn-info">add</button>
  </a>
  <form action="" class="col-9">
      <div class="form-group">
        
        <input type="search" name="search" value="{{$search}}"  id="" class="form-control"  placeholder="search" aria-describedby="helpId"  >
        <button class="btn btn-primary"> search</button>
      </div>
  </form>
  
      
      <table  class="table">
          <thead>
              <tr>
                  <th>id</th>
                  <th>title</th>
                  <th>description</th>
                  
                  
              </tr>
          </thead>
          <tbody>
              @foreach($project as $shah)
              <tr>
                 
                  <td>{{$shah->id}}</td>
                  <td><a href="{{url('/project/delete/')}}/{{$shah->id}}">id </a></td>
                  <td>{{$shah->name}}</td>
                 
                  
              </tr>
              @endforeach
          </tbody>
          

      </table>
      

      
   
  </body>
</html>