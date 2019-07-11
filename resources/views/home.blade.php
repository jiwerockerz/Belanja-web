@extends('layouts.app')

@section('pages')
Dashboard
@endsection



@section('content')
  @if (Session::has('success'))
    <div id="message" class="alert alert-success">
        {{ Session::get('success') }}
    </div>
  @endif
  <div class="col-md-3 col-sm-6 col-xs-12">
    <a href="{{ route('account.all')}}">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-money-check"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">All Account</span>
              <span class="info-box-number">{{ $accountCount }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </a>
      <!-- /.info-box -->
    </div>


@endsection
