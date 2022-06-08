<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Add Transaction Form </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container mt-2">
      <div class="row">
        <div class="col-lg-12 margin-tb">
          <div class="pull-left mb-2">
            <h2>Add Transaction</h2>
          </div>
          <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('transaction.index') }}"> Back</a>
          </div>
        </div>
      </div> 
      @if(session('status')) <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
      </div> 
      @endif 
      <form action="{{ route('transaction.store') }}" method="POST" enctype="multipart/form-data"> @csrf 
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Account ID:</strong>
              <select class="form-control" name="account_id">

                <option disabled>Select Item</option>
              
                @foreach ($accounts as $item)
                  <option value="{{ $item->id }}" > {{ $item->name }} </option>
                @endforeach    
              </select>
              
            </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Transaction Date :</strong>
              <input type="date" name="transaction_date" class="form-control" > @error('transaction_date') <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div> @enderror
            </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Description:</strong>
              <select name="description" id="" class="form-control">
                <option value="Setor Tunai">Setor Tunai</option>
                <option value="Bayar Listrik">Bayar Listrik</option>
                <option value="Beli Pulsa">Beli Pulsa</option>
              </select>
            </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Status :</strong>
              <select name="status" id="" class="form-control">
                <option value="C">Credit</option>
                <option value="D">Debit</option>
              </select>
            </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Amount :</strong>
              <input type="number" name="amount" class="form-control" > @error('amount') <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div> @enderror
            </div>
          </div>

          <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
      </form>
  </body>
</html>