<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Account</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container mt-2">
      <div class="row">
        <div class="col-lg-12 margin-tb">
          <div class="pull-left">
            <h2>Account</h2>
          </div>
          <div class="pull-right mb-2">
            <a class="btn btn-success" href="{{ route('account.create') }}"> Create Account</a>
          </div>
          <div class="pull-left mb-2">
            <a class="btn btn-primary" href="{{ route('main') }}"> Back</a>
          </div>
        </div>
      </div> @if ($message = Session::get('success')) <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div> @endif <table class="table table-bordered">
        <tr>
          <th>Account ID</th>
          <th>Name</th>
          <th width="280px">Action</th>
        </tr> 
        @foreach ($datas as $account) 
        <tr>
          <td>{{ $account->id }}</td>
          <td>{{ $account->name }}</td>
          <td>
            <form action="{{ route('account.destroy',$account->id) }}" method="Post">
              <a class="btn btn-primary" href="{{ route('account.edit',$account->id) }}">Edit</a> @csrf @method('DELETE') <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr> 
        @endforeach
      </table> {!! $datas->links() !!}
  </body>
</html>