<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container mt-2">
      <div class="row">
        <div class="col-lg-12 margin-tb">
          <div class="pull-left">
            <h2>Report {{$account->name}}</h2>
          </div>
          <div class="pull-left mb-2">
            <a class="btn btn-primary" href="{{ route('main') }}"> Back</a>
          </div>
        </div>
      </div>
      <table class="table table-bordered">
        <tr>
          <th>Transaction date</th>
          <th>Description</th>
          <th>Credit</th>
          <th>Debit</th>
          <th>Amount</th>
          
        </tr> 
        @foreach ($datas as $data) 
        <tr>
          <td>{{ $data->transaction_date }}</td>
          <td>{{ $data->description }}</td>
          <td>{{ $data->credit }}</td>
          <td>{{ $data->debit }}</td>
          <td>{{ $data->amount }}</td>
          
        </tr> 
        @endforeach
      </table> 
  </body>
</html>