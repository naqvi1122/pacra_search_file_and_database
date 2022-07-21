<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>upload</h1>
    <form action="fileupload" method="POST"  enctype="multipart/form-data" >
    @csrf
    <input type="text" name="name" placeholder="name">
    <input type="text" name="description" placeholder="description">
    <input type="file" name="file">
    <input type="submit">
    </form><br>
    <a href="/pdfdoc"><button  type="button" class="btn btn-primary">....pdf....</button></a>
    
</body>
</html>