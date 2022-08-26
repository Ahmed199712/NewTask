@extends('Dashboard.layouts.master')

@section('pageTitle') <i class="fa fa-users"></i> {{ trans('backend.users') }} @endsection

@section('content')

    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">
                {{ trans('backend.info') }} {{ trans('backend.users') }}
                
            </h3>
            
            <div class="button-page-header">
                <a class="btn btn-block btn-primary" href="{{ route('users.create') }}">
                <i class="fa fa-plus-circle fa-fw fa-lg"></i> {{ trans('backend.create_new') }}</a>
            </div>
            
                

            
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-hover table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><b>{{ trans('backend.image') }}</b></th>
                            <th><b>{{ trans('backend.name') }}</b></th>
                            <th><b>{{ trans('backend.email') }}</b></th>
                            <th><b>{{ trans('backend.phone') }}</b></th>
                            <th><b>{{ trans('backend.status') }}</b></th>
                            <th><b>{{ trans('backend.date') }}</b></th>
                            <th width="8%"><b>{{ trans('backend.manage') }}</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $users as $index=>$user )
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img style="width:40px;height:35px" src="{{ asset($user->avatar) }}" alt="">
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    @if( $user->status == 1 )
                                        <span class="badge label-success">{{ trans('backend.active') }}</span>
                                    @else
                                        <span class="badge label-danger">{{ trans('backend.inactive') }}</span>
                                    @endif
                                </td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>
                                <div class="btn-group manage-button" title="View Account">
                                    <a class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-cog"></i> <span class="caret"></span>
                                    </a>
                                    <ul role="menu" class="dropdown-menu dropdown-light pull-right">

                                         @if( $user->status == 0 )
                                            <li>
                                                <a title="{{ trans('backend.activation') }} {{ trans('backend.record') }}" href="{{ route('users.activation' , $user->id) }}">
                                                    <i class="fa fa-fw fa-check"></i> {{ trans('backend.activation') }}
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a title="{{ trans('backend.disable') }} {{ trans('backend.record') }}" href="{{ route('users.activation' , $user->id) }}">
                                                    <i class="fa fa-fw fa-close"></i> {{ trans('backend.disable') }}
                                                </a>
                                            </li>
                                        @endif

                                        <li>
                                            <a title="{{ trans('backend.show') }} {{ trans('backend.record') }}" href="{{ route('users.show' , $user->id) }}">
                                                <i class="fa fa-fw fa-eye"></i> {{ trans('backend.show') }}
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a title="{{ trans('backend.edit') }} {{ trans('backend.record') }}" href="{{ route('users.edit' , $user->id) }}">
                                                <i class="fa fa-fw fa-pencil"></i> {{ trans('backend.edit') }}
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('users.destroy' , $user->id) }}" method="POST" style="display:inline">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button title="{{ trans('backend.edit') }} {{ trans('backend.record') }}" type="submit"  class="delete" style="cursor:pointer">
                                                    <i class="fa fa-trash fa-fw"></i> {{ trans('backend.delete') }}
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>

@endsection