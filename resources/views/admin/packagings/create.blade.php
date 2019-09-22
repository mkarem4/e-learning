@extends('admin.layouts.app')

@section('title')
    إضافة
@endsection
@section('topBar')
    <li class="m-menu__item">
        <a href="{{url('admincp')}}" class="m-menu__link">
            <span class="m-menu__link-text">Home</span>
            <i class="m-menu__hor-arrow la la-angle-left"></i>
        </a>
    </li>
    <li class="m-menu__item">
        <a href="{{url('admincp/countries')}}" class="m-menu__link">
            <span class="m-menu__link-text"> Create Packaging </span>
            <i class="m-menu__hor-arrow la la-angle-left"></i>
        </a>
    </li>
@endsection

@section('header')
@endsection

@section('content')
    
  @if(Session::has('message'))
      <div class="form-group mg-t-20">
          <div class="col-md-12">
              <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  {{ Session::get('message') }}
              </div>
          </div>
      </div>
  @endif
  
    <!--begin::Portlet-->
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
					<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
					</span>
                    <h3 class="m-portlet__head-text">
                        New Packaging
                    </h3>
                </div>
            </div>
        </div>

      

        <!--begin::Form-->
        <form  class="m-form m-form--fit m-form--label-align-right" action="{{ $base_url }}" method="post">
            {{ csrf_field() }}
<input type="hidden" name="status" value="1" >
            <div class="m-portlet__body">
                <div class="form-group m-form__group row">
                    <label class="col-lg-1 col-form-label"> Arabic Name </label>
                    <div class="col-lg-4{{ $errors->has('packaging_name_ar') ? ' has-danger' : '' }}">
                        {!! Form::text('packaging_name_ar',null,['class'=>'form-control m-input','autofocus','placeholder'=>"اسم البراند بالعربيه"]) !!}
                        <p id="packaging_name_ar_error" class="error_message invalid-feedback" style="display: block"></p>
                    </div>
                    <label class="col-lg-1 col-form-label"> English Name </label>
                    <div class="col-lg-5{{ $errors->has('packaging_name_en') ? ' has-danger' : '' }}">
                        {!! Form::text('packaging_name_en',null,['class'=>'form-control m-input','placeholder'=>"اسم البراند بالانجليزيه"]) !!}
                        <p id="packaging_name_en_error" class="error_message invalid-feedback" style="display: block"></p>
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Portlet-->
@endsection
@section('footer')
    <script type="text/javascript">
        $('form').on('submit', function (e) {
              e.preventDefault();
              var formData = new FormData(this);
                console.log(formData);

              $.ajax({
                  type: 'POST',
                  headers: {
                            //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': '{{$access_token}}',

                          },
                  url: $(this).attr('action'),
                  data: formData,
                  cache: false,
                  contentType: false,
                  accepts: {
                      text: "json"
                  },
                  dataType : 'json',
                  processData: false,
                  success: function (data) {
                      if (data.statusCode == 200) {

                        showMessage('packaging has been saved successfully' , 'success');
                        location.reload();
                        Custombox.close();                          
                      }else{
                        if (data.statusCode == 502) {
                            showMessage( data.message, 'error');
                            //location.reload();
                            Custombox.close();
                        }
                        console.log(data);
                        showMessage(data.statusCode , 'error');
                        //showMessage(data.message , 'error');
                        //redirectPage(route);
                        Custombox.close();
                    }
                  },
                  error: function (data) {
                    errors = data.responseJSON.errors;

                    $(".error_message").empty();
                    // $(".error_message").addClass('invalid-feedback');

                    $.each(errors, function (key, val) {
                        $("#" + key + "_error").text(val);
                    });
                  }
              });
              return false;
          });
    </script>
@endsection

