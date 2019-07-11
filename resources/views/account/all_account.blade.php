@extends('layouts.app')
@section('pages')
  Account
@endsection
@section('small-titles')

@endsection
@section('breadcrumb')
  <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">@yield('pages')</li>
@endsection
@section('content')
  <div class="row">
    {{-- {{$accounts}} --}}
  @if($accounts)
      @foreach($accounts as $account)
         <div class="col-md-3 col-sm-6 col-xs-12">
           <a href="{{ route('account.detail', ['name' => $account->acc_id]) }}">
                 <div class="info-box">
                   <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                   <div class="info-box-content">
                     <span class="info-box-text">{{ $account->acc_name }}</span>
                     <span class="info-box-number">RM {{ $account->balance }}</span>
                   </div>
                   <!-- /.info-box-content -->
                 </div>
               </a>
                 <!-- /.info-box -->
           </div>
      @endforeach
  @else
  @endif


      {{-- Modal Box --}}
      <div class="modal fade" id="addAccount" tabindex="-1" role="dialog" aria-labelledby="addAccountLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content modal-dark-theme">
          <div class="modal-header">
            <h5 class="modal-title" id="addAccountLabel">Add Account</h5>
            <button type="button" class="close close-red" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="{{ route('account.create') }}">
              {{ csrf_field() }}
              <div class="modal-body">
                <div class="form-group col-md-8">
                  <input type="text" class="form-control" id="id_account" name="account"
                   aria-describedby="account" placeholder="Enter Account Name" autocomplete="off" required>
                </div>
                <div class="form-group col-md-8">
                  <input type="number" class="form-control" id="id_amount" name="amount"
                   aria-describedby="amount" placeholder="Enter Amount" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-primary">Create New Account</button>
              </div>
          </form>
          </div>
        </div>
      </div>

  </div>

  <div class="float-btn">
    <a href="#" class="float" data-toggle="modal" data-target="#addAccount">
      <i class="fa fa-plus my-float"></i>
    </a>
    <div class="label-container">
      <div class="label-text">Add Account</div>
      <i class="fa fa-play label-arrow"></i>
    </div>

  </div>
@endsection
