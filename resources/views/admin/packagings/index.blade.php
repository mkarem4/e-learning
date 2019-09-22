@extends('admin.layouts.app')
@section('title')
All Packagings
@endsection

@section('topBar')
    <li class="m-menu__item">
        <a href="" class="m-menu__link">
            <span class="m-menu__link-text">Home</span>
            <i class="m-menu__hor-arrow la la-angle-left"></i>
        </a>
    </li>
    <li class="m-menu__item active-top-bar">
        <a href="javascript:;" class="m-menu__link">
            <span class="m-menu__link-text">Setting</span>
            <i class="m-menu__hor-arrow la la-angle-down"></i>
        </a>
    </li>
    <li class="m-menu__item">
        <a href="" class="m-menu__link"  data-toggle="modal" data-target="#new_packaging">
            <span class="m-menu__link-text">Add New Packaging </span>
        </a>
    </li>
@endsection

@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Manage Packagings
                    </h3>
                </div>
            </div>

            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item"></li>
                </ul>
            </div>
        </div>
        
        <div class="m-portlet__body">
            <form class="m-form m-form--fit m--margin-bottom-20" action="/admincp/packagings">
                <div class="row m--margin-bottom-20">
                    <div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control m-input" placeholder="name" data-col-index="0" value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}">
                    </div>
           @php 
        if(isset($_GET['status'])):
        $status = $_GET['status'];
        else: 
        $status = -1; 
        endif;
        @endphp
    <div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
                    <label>Status :</label>
                    <select class="form-control m-input" data-col-index="2" name="status">
                        <option value="-1" {{$status == '-1' ? 'selected' : ''}}>all</option>
                        <option value="1" {{$status == 1 ? 'selected' : ''}}>activated</option>
                        <option value="0" {{$status == 0 ? 'selected' : ''}}>deactivated</option>
                    </select>
                </div>
                    <div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
                        <!-- <label>RecordID:</label>
                        <input type="text" class="form-control m-input" placeholder="E.g: 4590" data-col-index="0"> -->
                        <br>
                        <button class="btn btn-brand m-btn m-btn--icon" id="m_search" type="submit">
                              <span>
                                  <i class="la la-search"></i>
                                  <span>Search</span>
                              </span>
                        </button>
                    </div>
                    
                </div>
                <div class="m-separator m-separator--md m-separator--dashed"></div>
            </form>

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover responsive" id="m_table_1">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Arabic Name</th>
                    <th class="text-center">English Name</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($packagings as $packaging)
                  <tr>
                  <td class="text-center">{{ $packaging->id }}</td>
                  <td class="text-center">{{ isset($packaging->ar)  ? $packaging->ar->name  : 'N/A'}}</td>
                  <td class="text-center">{{ isset($packaging->en)  ? $packaging->en->name  : 'N/A'}}</td>
                  <td><span class="badge {{ $packaging->is_active == 1 ? 'badge-success' : 'badge-warning'}}">{{ $packaging->is_active == 1 ? 'activated' : 'de-activated' }}</span></td>
                  <td class="text-center">
                    <a href="#" data-toggle="modal" data-target="#edit_{{ $packaging->id}}" class="btn btn-brand m-btn editStatus"   data-id="{{ $packaging->id }}">
                        <i class="fa fa-edit"></i>
                    </a>

                    <div class="modal fade" id="edit_{{$packaging->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form id="editPackaging" action="{{$base_url.$packaging->id}}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            {{ method_field('PUT') }}

                          <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-form-label text-left">Name in Ar :</label>
                                    <input type="text" class="form-control" name="packaging_name_ar" value="{{$packaging->ar->name}}"  >
                                    <p id="packaging_name_ar_error" class="error_message invalid-feedback" style="display: block"></p>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Name in En :</label>
                                    <input type="text" class="form-control" name="packaging_name_en" value="{{$packaging->en->name}}"  >
                                    <p id="packaging_name_en_error" class="error_message invalid-feedback" style="display: block"></p>
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal" onclick="Custombox.close();">Close</button>
                            <button type="submit" class="btn btn-primary submit" CausesValidation="False">Save changes</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <a href="javascript:;" id="delete{{ $packaging->id }}" data-id="{{ $packaging->id }}" class="btn btn-danger m-btn delete delete" data-url="{{$base_url.$packaging->id}}">
                        <i class="fa fa-trash"></i>
                    </a>


                    @if($packaging->is_active == 0)
                    <a href="#" class="activate elementStatus btn btn-warning m-btn elementStatus" data-id="{{ $packaging->id }}" data-url="{{ $base_url.$packaging->id }}">
                      <i class="fa fa-check-circle"></i>
                    </a>
                    @endif

                    @if($packaging->is_active == 1)
                    <a href="#" class="deactivate elementStatus btn btn-warning m-btn elementStatus" data-id="{{ $packaging->id }}" data-url="{{ $base_url.$packaging->id }}">
                      <i class="fa fa-ban"></i>
                    </a>
                    @endif
                  </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>


<div class="modal fade" id="new_packaging" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Packaging</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="new_packaging_form" action="{{$new_url}}" enctype="multipart/form-data" method="post">

              {{ csrf_field() }}


            <div class="modal-body">
                  <div class="form-group">
                      <label class="col-form-label text-left">Name in Ar :</label>
                      <input type="text" class="form-control" name="packaging_name_ar"  >
                      <p id="packaging_name_ar_add_error" class="add_error_message invalid-feedback" style="display: block"></p>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label">Name in En :</label>
                      <input type="text" class="form-control" name="packaging_name_en"  >
                      <p id="packaging_name_en_add_error" class="add_error_message invalid-feedback" style="display: block"></p>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-secondary" data-dismiss="modal" onclick="Custombox.close();">Close</button>
              <button type="submit" class="btn btn-primary submit" CausesValidation="False">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>

@endsection

@section('footer')
    <script>
      $('form#new_packaging_form').on('submit', function (e) {
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

                    $(".add_error_message").empty();
                    // $(".error_message").addClass('invalid-feedback');

                    $.each(errors, function (key, val) {
                        $("#" + key + "_add_error").text(val);
                    });
                  }
              });
              return false;
          });

        $('form#editPackaging').on('submit', function (e) {
              e.preventDefault();
              var formData = new FormData(this);
              console.log(formData);

              $.ajax({
                  type: 'PUT',
                  headers: {
                            //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': '{{$access_token}}',

                          },
                  url: $(this).attr('action'),
                  data: $(this).serializeArray(),
                  processData: true,
                  success: function (data) {
                      if (data.statusCode == 200) {

                        showMessage('packaging has been updated successfully' , 'success');
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

                    console.log(errors);

                    $(".error_message").empty();
                    // $(".error_message").addClass('invalid-feedback');

                    $.each(errors, function (key, val) {
                        $("#" + key + "_error").text(val);
                    });
                  }
              });
              return false;
          });

        $('.activate').on('click', function () {
              var id = $(this).attr('data-id');
              var url = $(this).attr('data-url')+'/activate';

              var $tr = $(this).closest($('#resolve' + id).parent().parent());
              swal({
                  title: "Are you sure to activate",
                  text: "",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "confirm",
                  cancelButtonText: "cancel",
                  confirmButtonClass: 'btn-danger waves-effect waves-light',
                  closeOnConfirm: true,
                  closeOnCancel: true,
              }, function (isConfirm) {
                  if (isConfirm) {
                      console.log('confirmed');
                      $.ajax({
                          type: 'GET',
                          headers: {
                            //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': '{{$access_token}}',

                          },
                          url: url,
                          success: function (data) {
                              console.log(data);
                              if (data.statusCode == 200) {
                                  $tr.find('td').fadeOut(1000, function () {
                                      $tr.remove();
                                  });
                                  $tr.remove();
                                showMessage('activated successfully' , 'success');
                                location.reload();
                              }else if(data.statusCode == 502){
                                showMessage(data.message , 'error');
                              }else if (data.statusCode == 404) {
                                showMessage('not found' , 'error');
                              }else{
                                showMessage('fail' , 'error');
                              }
                          },
                          error: function(data) {
                              console.log(data);
                            showMessage('not found' , 'error');
                          }
                      });
                  } else {
                      swal({
                          title: "cancelled",
                          text: "",
                          type: "error",
                          showCancelButton: false,
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "confirm",
                          confirmButtonClass: 'btn-info waves-effect waves-light',
                          closeOnConfirm: false,
                          closeOnCancel: false
                      });
                  }
              });
          });

        $('.deactivate').on('click', function () {
              var id = $(this).attr('data-id');
              var url = $(this).attr('data-url')+'/deactivate';

              var $tr = $(this).closest($('#resolve' + id).parent().parent());
              swal({
                  title: "Are you sure to deactivate",
                  text: "",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "confirm",
                  cancelButtonText: "cancel",
                  confirmButtonClass: 'btn-danger waves-effect waves-light',
                  closeOnConfirm: true,
                  closeOnCancel: true,
              }, function (isConfirm) {
                  if (isConfirm) {
                      console.log('confirmed');
                      $.ajax({
                          type: 'GET',
                          headers: {
                            //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': '{{$access_token}}',

                          },
                          url: url,
                          success: function (data) {
                              console.log(data);
                              if (data.statusCode == 200) {
                                  $tr.find('td').fadeOut(1000, function () {
                                      $tr.remove();
                                  });
                                  $tr.remove();
                                showMessage('deactivated successfully' , 'success');
                                location.reload();
                              }else if(data.statusCode == 502){
                                showMessage(data.message , 'error');
                              }else if (data.statusCode == 404) {
                                showMessage('not found' , 'error');
                              }else{
                                showMessage('fail' , 'error');
                              }
                          },
                          error: function(data) {
                              console.log(data);
                            showMessage('not found' , 'error');
                          }
                      });
                  } else {
                      swal({
                          title: "cancelled",
                          text: "",
                          type: "error",
                          showCancelButton: false,
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "confirm",
                          confirmButtonClass: 'btn-info waves-effect waves-light',
                          closeOnConfirm: false,
                          closeOnCancel: false
                      });
                  }
              });
          });

        $('.delete').on('click', function () {
              var id = $(this).attr('data-id');
              var url = $(this).attr('data-url');

              var $tr = $(this).closest($('#resolve' + id).parent().parent());
              swal({
                  title: "Are you sure to delete",
                  text: "",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "confirm",
                  cancelButtonText: "cancel",
                  confirmButtonClass: 'btn-danger waves-effect waves-light',
                  closeOnConfirm: true,
                  closeOnCancel: true,
              }, function (isConfirm) {
                  if (isConfirm) {
                      console.log('confirmed');
                      $.ajax({
                          type: 'DELETE',
                          headers: {
                            //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': '{{$access_token}}',

                          },
                          url: url,
                          success: function (data) {
                              console.log(data);
                              if (data.statusCode == 200) {
                                  $tr.find('td').fadeOut(1000, function () {
                                      $tr.remove();
                                  });
                                  $tr.remove();
                                showMessage('deleted successfully' , 'success');
                                location.reload();
                              }else if(data.statusCode == 502){
                                showMessage(data.message , 'error');
                              }else if (data.statusCode == 404) {
                                showMessage('not found' , 'error');
                              }else{
                                showMessage('fail' , 'error');
                              }
                          },
                          error: function(data) {
                              console.log(data);
                            showMessage('not found' , 'error');
                          }
                      });
                  } else {
                      swal({
                          title: "cancelled",
                          text: "",
                          type: "error",
                          showCancelButton: false,
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "confirm",
                          confirmButtonClass: 'btn-info waves-effect waves-light',
                          closeOnConfirm: false,
                          closeOnCancel: false
                      });
                  }
              });
          });
    </script>    
@endsection
