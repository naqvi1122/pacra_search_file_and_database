<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Autocomplete Search using Bootstrap Typeahead JS - Codingspoint.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
</head>
<body>
   
<div class="container">
    <h1>Laravel 8 Autocomplete Search using Bootstrap Typeahead JS - Codingspoint.com</h1>   
    <input class="typeahead form-control" type="text">
</div>
   
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
   
</body>
</html>