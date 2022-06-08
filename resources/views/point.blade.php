<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>POINT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container mt-2">
      <div class="row">
        <div class="col-lg-12 margin-tb">
          <div class="pull-left">
            <h2>POINT</h2>
          </div>
          <div class="pull-left mb-2">
            <a class="btn btn-primary" href="{{ route('main') }}"> Back</a>
          </div>
        </div>
      </div>
      <table class="table table-bordered">
        <tr>
          <th>Account ID</th>
          <th>Name</th>
          <th>point</th>
          
        </tr> 
        @foreach ($datas as $data) 
        <tr>
          <td>{{ $data->id }}</td>
          <td>{{ $data->name }}</td>
          <td>{{ $data->point }}</td>
          
        </tr> 
        @endforeach
      </table> 
  </body>
</html>