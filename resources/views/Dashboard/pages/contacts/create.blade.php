@extends('Dashboard.layouts.master')

@section('pageTitle') 
    <i class="fa fa-tags"></i> {{ trans('backend.add') }} {{ trans('backend.contacts') }} 
@endsection

@section('content')

    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('backend.enter') }} {{ trans('backend.infos') }}</h3>

            <!-- Start Button  -->
            <div class="button-page-header" style="margin-top:5px">
                <a class="btn btn-block btn-warning" href="{{ route('contacts.index') }}">
                <i class="fa fa-reply fa-fw fa-lg"></i> {{ trans('backend.back') }}</a>
            </div>
            
        </div>

        <div class="box-body">
                
            <form id="myForm" action="{{ route('contacts.store') }}" method="POST" class="userForm" enctype="multipart/form-data">
                {{ csrf_field() }}

                <!-- Start Row  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name"><b>{{ trans('backend.contact_category') }}</b></label>
                            <select name="category_id" id="category_id" class="form-control select2" style="width:100%">
                                <option value="">..........</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('category_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name"><b>{{ trans('backend.name') }}</b></label>
                            <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center" style="">
                            <button type="submit" class="btn btn-primary btn-block" style="font-size:16px"><i class="fa fa-check fa-fw fa-lg"></i> {{ trans('backend.save') }}</button>
                        </div>
                    </div>
                </div>

                

                    

                
            </form>
                    
        </div>    

    </div>

@endsection


@push('scripts')
<script>
$(document).ready(function(){

  // Validate Form ...
//   $('#myForm').validate({
//       rules : {
//         name : { required : true , minlength: 3 }
//       },
//       messages : {

//       },
//       errorEelement : 'span',
//       errorPlacement : function(error , element){
//           element.closest('.form-group').append(error);
//       },

//   }); 

});
</script>
@endpush