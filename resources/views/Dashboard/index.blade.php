@extends('Dashboard.layouts.master')

@section('pageTitle') <i class="fa fa-dashboard"></i> {{ trans('backend.dashboard') }} @endsection

@section('content')
<!-- Info boxes -->
    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner text-uppercase">
            <h3>{{ $admins->count() }}</h3><p>{{ trans('backend.admins') }}</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
            
          <a href="{{ route('admins.index') }}" class="small-box-footer text-uppercase"> {{ trans('backend.show_info') }} <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner text-uppercase">
            <h3>{{ $admins->count() }}</h3><p>{{ trans('backend.admins') }}</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
            
          <a href="{{ route('admins.index') }}" class="small-box-footer text-uppercase"> {{ trans('backend.show_info') }} <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner text-uppercase">
            <h3>{{ $admins->count() }}</h3><p>{{ trans('backend.admins') }}</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
            
          <a href="{{ route('admins.index') }}" class="small-box-footer text-uppercase"> {{ trans('backend.show_info') }} <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner text-uppercase">
            <h3>{{ $admins->count() }}</h3><p>{{ trans('backend.admins') }}</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
            
          <a href="{{ route('admins.index') }}" class="small-box-footer text-uppercase"> {{ trans('backend.show_info') }} <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      

    </div>
    
    <!-- Info boxes -->

@endsection


@push('scripts')

    <script>

        //line chart
        /*var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
              {y: '2006', a: 100, b: 90},
              {y: '2007', a: 75, b: 65},
              {y: '2008', a: 50, b: 40},
              {y: '2009', a: 75, b: 65},
              {y: '2010', a: 50, b: 40},
              {y: '2011', a: 75, b: 65},
              {y: '2012', a: 100, b: 90}
            ],
            barColors: ['#00a65a', '#f56954'],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: [1,2,3,4,5,6],
            lineWidth: 2,
            hideHover: 'auto',
            gridStrokeWidth: 0.4,
            pointSize: 4,
            gridTextFamily: 'Open Sans',
            gridTextSize: 10
        });*/

        var bar = new Morris.Bar({
        element: 'line-chart',
        resize: true,
        data: [
          {y: '2006', a: 100, b: 90},
          {y: '2007', a: 75, b: 65},
          {y: '2008', a: 50, b: 40},
          {y: '2009', a: 75, b: 65},
          {y: '2010', a: 50, b: 40},
          {y: '2011', a: 75, b: 65},
          {y: '2012', a: 100, b: 90}
        ],
        barColors: ['#00a65a', '#f56954'],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['CPU', 'DISK'],
        hideHover: 'auto'
      });
    </script>

@endpush