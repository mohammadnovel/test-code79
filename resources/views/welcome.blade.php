<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body> 
 
<div class="container">
  <div class="col-md-12" style="padding-top:10%;">
    <h2>Test Code</h2>
    <p>PT. Padepokan Tujuh Sembilan.</p>
    <p><strong>Note:</strong> Crud Akun, Transaksi, Point, Report:</p>
    <div class="row">
        <form action="{{route('report')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="daterange">Account</label>
                <select class="form-control" name="account_id" style="height: 10%">
        
                <option disabled>Select Customer</option>
                
                @foreach ($accounts as $item)
                    <option value="{{ $item->id }}" > {{ $item->name }} </option>
                @endforeach    
                </select>
            </div>
            <div class="form-group">
                <label for="daterange">Start Date</label>
                <input type="date" id="startDate" name="start_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="daterange">End Date</label>
                <input type="date" id="endDate" name="end_date" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Cetak Report</button>
            </div>
        
        </form>
    </div>
    <div class="card-columns">
        <div class="card bg-primary">
            <a href="{{route('account.index')}}">
                <div class="card-body text-center">
                    <p class="card-text text-white">Akun</p>
                </div>
            </a>
        </div>
        
        <div class="card bg-primary">
            <a href="{{route('transaction.index')}}">
                <div class="card-body text-center">
                    <p class="card-text text-white">Transaksi</p>
                </div>
            </a>
        </div>

        <div class="card bg-primary">
            <a href="{{route('point-list')}}">
                <div class="card-body text-center">
                    <p class="card-text text-white">Point</p>
                </div>
            </a>
        </div>
    </div>
  </div>
</div>

</body>
</html>
