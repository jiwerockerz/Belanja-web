@extends('layouts.app')
@section('pages')
{{ $accounts->name }}
@endsection
@section('small-titles')
<small>Account</small>
{{-- <a href="#">
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newRecord">New Record</button>
</a> --}}
@endsection
@section('breadcrumb')
  <div class="container">
    <li><a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> Home</a></li>
    <li><a href="{{ route('account.all') }}"><i class="fas fa-tachometer-alt"></i> Account</a></li>
    <li class="active">@yield('pages')</li>
  </div>

@endsection
@section('content')

Balance : RM {{$accounts->amount}}
<a href = '#' data-toggle="modal" data-target="#deleteAccount">Delete</a>


<div class="col-sm-12">
    <table id="example2" class="table table-hover table-striped" role="grid" aria-describedby="example2_info">
        <thead>
            <tr role="row">
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" class="sorting_asc">Type</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" class="sorting">Label</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" class="sorting">Category</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" class="sorting">Description</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" class="sorting">Amount</th>
                <th rowspan="1" colspan="1">Balance</th>
                <th tabindex="0"  rowspan="1" colspan="1"  class="sorting">Date</th>
            </tr>
        </thead>
        <tbody>

            @foreach($records as $record)
            <tr role="row" class="odd">
                <td>{{ $record->type }}</td>
                <td>{{ $record->label }}</td>
                <td>{{ $record->category }}</td>
                <td>{{ $record->describe }}</td>
                <td>{{ $record->amount }}</td>
                <td>{{ $record->balance }}</td>
                <td>{{ $record->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th rowspan="1" colspan="1">Type</th>
                <th rowspan="1" colspan="1">Label</th>
                <th rowspan="1" colspan="1">Category</th>
                <th rowspan="1" colspan="1">Description</th>
                <th rowspan="1" colspan="1">Amount</th>
                <th rowspan="1" colspan="1">Balance</th>
                <th rowspan="1" colspan="1">Date</th>
            </tr>
        </tfoot>
    </table>
</div>




{{-- Modal Box --}}
<div class="modal fade" id="newRecord" tabindex="-1" role="dialog" aria-labelledby="newRecordLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content modal-dark-theme">
    <div class="modal-header">
      <h5 class="modal-title" id="newRecordLabel">New Record</h5>
      <button type="button" class="close close-red" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form method="POST" action="{{ route('record.create', ['id' => $record->account]) }}">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group col-md">
            <select class="form-control select-dark" id="type_rec" name="type_rec"
             aria-describedby="account" required>
             <option value="" disabled selected>Record Type</option>
             <option value="in">Income</option>
             <option value="out">Expense</option>
             <option value="transfer">Transfer</option>
            </select>
          </div>
          <div class="form-group col-md">
            <input type="number" class="form-control" id="id_amount" name="amount_rec"
             aria-describedby="amount" placeholder="Enter Amount" min="0.10" value="0" step=".01" required>
          </div>
          <div class="form-group col-md">
            <textarea class="form-control" name="desc_rec" rows="3" placeholder="Description"></textarea>
          </div>
          <div class="form-group col-md">
            <div class="input-group">
              <select class="form-control select-dark" id="id_label" name="label_rec"
              aria-describedby="label">
                <option value="" disabled selected>Add Label</option>
                <option value="gaji">Gaji</option>
                <option value="mamak">Mamak</option>
                <option value="tabung">Tabung</option>
              </select>
              {{-- <span class="input-group-addon"><i class="fa fa-check">%</i></span> --}}
            </div>
          </div>
          <div class="form-group col-md">
            <div class="input-group">
              <select class="form-control select-dark" id="id_category" name="category_rec"
               aria-describedby="category">
               <option value="" disabled selected>Category</option>
               <option value="gaji">Transportation</option>
               <option value="mamak">Income</option>
               <option value="tabung">Groceries</option>
              </select>
              {{-- <span class="input-group-addon"><i class="fa fa-check">%</i></span> --}}
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary">Cancel</button>
          <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
    </form>
    </div>
  </div>
</div>


<div class="modal fade" id="deleteAccount" tabindex="-1" role="dialog" aria-labelledby="newRecordLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content modal-dark-theme">
    <div class="modal-header">
      <h5 class="modal-title" id="newRecordLabel">Delete {{ $accounts->name }}'s Account</h5>
      <button type="button" class="close close-red" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
        <div class="modal-body">
          <p>Are sure to delete?</p>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="{{ route('account.delete', ['id_acc' => $accounts->id]) }}">
            <button type="submit" class="btn btn-primary">Confirm</button>
          </a>
        </div>
    </div>
  </div>
</div>


<div class="float-btn">
  <a href="#" class="float" data-toggle="modal" data-target="#newRecord">
    <i class="fa fa-plus my-float"></i>
  </a>
  <div class="label-container">
    <div class="label-text">New Record</div>
    <i class="fa fa-play label-arrow"></i>
  </div>

</div>
{{-- <div class="float-btn">
  <a href="#" class="float" id="menu-share">
    <i class="fa fa-bars my-float"></i>
  </a>
  <ul>
    <li>
      <a href="#" data-toggle="modal" data-target="#newRecord">
      <i class="fa fa-coins my-float"></i>
      </a>
      <div class="label-container">
        <div class="label-text">New Record</div>
        <i class="fa fa-play label-arrow"></i>
      </div>
    </li>
    <li>
      <a href="#">
      <i class="fa fa-exchange-alt my-float"></i>
      </a>
      <div class="label-container">
        <div class="label-text">Transfer</div>
        <i class="fa fa-play label-arrow"></i>
      </div>
    </li>
  </ul>

</div> --}}
@endsection
