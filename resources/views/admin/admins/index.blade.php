@extends('admin.layouts.app')
@section('title')
Admins
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
            <span class="m-menu__link-text">Admins</span>
            <i class="m-menu__hor-arrow la la-angle-down"></i>
        </a>
    </li>
    <li class="m-menu__item">
        <a href="" class="m-menu__link" data-toggle="modal" data-target="#createAdmin">
            <span class="m-menu__link-text">add new admin</span>
            <i class="m-menu__hor-arrow la la-angle-down"></i>
        </a>
    </li>
@endsection

@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Admins
                    </h3>
                </div>
            </div>
            @php 
                if(isset($_GET['status'])):
                     $status = $_GET['status'];
                else: 
                    $status = 1; 
                endif;
            @endphp

            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">

                    <li class="m-portlet__nav-item"></li>

                    <!-- Modal -->
        <div class="modal fade" id="createAdmin" tabindex="-1" role="dialog" aria-labelledby="createAdminLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="createAdminLabel">Create new Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="storeAdmin" action="{{$url}}" method="post" enctype="multipart/form-data" data-parsley-validate novalidate>
              <div class="modal-body">
                <div class="form-group">
                    <label class="col-form-label">first name :</label>
                    <input type="text" class="form-control" name="first_name" required data-parsley-required-message="kindly enter first name"  autocomplete="off"> 
                  </div>

                  <div class="form-group">
                    <label class="col-form-label">last name :</label>
                    <input type="text" class="form-control" name="last_name" required data-parsley-required-message="kindly enter last name"  autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label class="col-form-label">username :</label>
                    <input type="text" class="form-control" name="username" required data-parsley-required-message="kindly enter username"  autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label class="col-form-label">email :</label>
                    <input type="email" class="form-control" name="email" required data-parsley-required-message="kindly enter email"  autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label class="col-form-label">password :</label>
                    <input type="text" class="form-control" name="password" required data-parsley-required-message="kindly enter password"  autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label class="col-form-label">password_confirmation :</label>
                    <input type="text" class="form-control" name="password_confirmation" required data-parsley-required-message="kindly enter password confirmatin"  autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label class="col-form-label">profile picture:</label>
                    <input type="file" class="dropify" name="photo" data-max-file-size="5M" accept="image/*">
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal" onclick="Custombox.close();">Close</button>
                <button type="submit" class="btn btn-primary storeAdminForm">Save changes</button>
              </div>
              </form>
            </div>
          </div>
        </div>
                    
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <form class="m-form m-form--fit m--margin-bottom-20" action="/admincp/admins">
                <div class="row m--margin-bottom-20">
                    
                    <div class="col-lg-2 m--margin-bottom-10-tablet-and-mobile">
                        <label>Status :</label>
                        <select class="form-control m-input" data-col-index="2" name="status">
                            <!-- <option value="1">Select</option> -->
                            <option value="1" {{$status == 1 ? 'selected' : ''}}>activated</option>
                            <option value="0" {{$status == 0 ? 'selected' : ''}}>deactivated</option>
                        </select>
                    </div>

                    <div class="col-lg-2 m--margin-bottom-10-tablet-and-mobile">
                        <label>id:</label>
                        <input type="number" name="id" class="form-control m-input" placeholder="name" data-col-index="0">
                    </div>

                    <div class="col-lg-2 m--margin-bottom-10-tablet-and-mobile">
                        <label>username:</label>
                        <input type="text" name="name" class="form-control m-input" placeholder="name" data-col-index="0">
                    </div>

                    <div class="col-lg-2 m--margin-bottom-10-tablet-and-mobile">
                        <label>email:</label>
                        <input type="email" name="email" class="form-control m-input" placeholder="name" data-col-index="0">
                    </div>
                    
                    <div class="col-lg-2 m--margin-bottom-10-tablet-and-mobile">
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
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-brand m-btn m-btn--icon" id="m_search">
                            <span>
                                <i class="la la-search"></i>
                                <span>Search</span>
                            </span>
                        </button>
                        &nbsp;&nbsp;
                        <button class="btn btn-secondary m-btn m-btn--icon" id="m_reset">
                            <span>
                                <i class="la la-close"></i>
                                <span>Reset</span>
                            </span>
                        </button>
                    </div>
                </div> -->
            </form>

            <!--begin: Datatable -->
            <!-- <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1"> -->
            <!-- <table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap example" id="m_table_1"> -->
            <table class="table table-striped- table-bordered table-hover responsive" id="m_table_1">
                <thead>
                <tr>
                    <!-- <th>#</th> -->
                    <th>ID</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>profile picture</th>
                    <th>Status</th>
                    <!-- <th>Change Status</th> -->
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($admins as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{ $model->name }}</td>
                    <td>{{$model->first_name . ' ' . $model->last_name }}</td>
                    <td>{{$model->email}}</td>
                    <td>
                        @if($model->photo != '')
                            <img class="img-responsive" style="width: 50px; height: 50px;" src="{{ $model->photo }}"/>
                        @else
                          
                        @endif
                    </td>
                    <td>{{ $model->status == 1 ? 'activated' : 'deactivated'}}</td>
                    
                    <td>

                        <a href="javascript:;" id="elementRow{{ $model->id }}" data-id="{{ $model->id }}" data-status="{{$model->status}}"
                            class="elementStatus btn {{ $model->status == 1 ? 'btn-warning' : 'btn-success' }} m-btn elementStatus" data-toggle="tooltip" data-placement="top" title="{{ $model->status == 1 ? 'deactivate' : 'activate' }}">

                            <i class="fa {{ $model->status == 1 ? 'fa-ban' : 'fa-check-circle' }}"></i>

                        </a>    
                        
                        <a href="javascript:;" class="btn btn-brand m-btn"  data-toggle="modal" data-target="#exampleModal{{$model->id}}" data-toggle="tooltip" data-placement="top" title="edit">
                            <i class="fa fa-edit"></i>
                        </a>

                        <a href="javascript:;" id="delete{{ $model->id }}" data-id="{{ $model->id }}" class="btn btn-danger m-btn delete" data-url="{{$url.'/'.$model->id}}" data-toggle="tooltip" data-placement="top" title="delete">
                            <i class="fa fa-trash"></i>
                        </a>

                        <a href="javascript:;" id="resetPassword{{ $model->id }}" data-id="{{ $model->id }}" class="btn btn-primary m-btn resetPassword" data-url="{{$url.'/'.$model->id}}" data-toggle="tooltip" data-placement="top" title="reset password">
                            <!-- <i class="fa fa-trash"></i> -->Reset Password
                        </a>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$model->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form id="editAdmin" action="{{$url.'/'.$model->id}}" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                
                                    {{ method_field('PUT') }}
                                    <div class="form-group">
                                        <label class="col-form-label">first name :</label>
                                        <input type="text" class="form-control" name="first_name" value="{{$model->first_name}}" required data-parsley-required-message="kindly enter first name"  autocomplete="off"> 
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">last name :</label>
                                        <input type="text" class="form-control" name="last_name" value="{{$model->last_name}}" required data-parsley-required-message="kindly enter last name"  autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">username :</label>
                                        <input type="text" class="form-control" name="username" value="{{$model->name}}" required data-parsley-required-message="kindly enter username"  autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">email :</label>
                                        <input type="email" class="form-control" name="email" value="{{$model->email}}" required data-parsley-required-message="kindly enter email"  autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">password :</label>
                                        <input type="text" class="form-control" name="password" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">password_confirmation :</label>
                                        <input type="text" class="form-control" name="password_confirmation" autocomplete="off">
                                    </div>
                                  
                                    <input type="hidden" id="oldPhoto{{$model->id}}" name="oldPhoto" value="{{$model->photo}}">
                                    <div class="form-group">
                                        <label class="col-form-label">profile picture :</label>
                                        <input type="file" class="dropify" id="flag" name="photo" data-max-file-size="5M" accept="image/*"
                                        data-default-file="{{ $model->photo }}" data-modelId="{{$model->id}}">
                                    </div>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal" onclick="Custombox.close();">Close</button>
                                <button type="submit" class="btn btn-primary" CausesValidation="False">Save changes</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>

                    </td>
                </tr>
                @empty
                
                @endforelse
                    
                
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
    <script>



        $(document).ready(function() {
//             var oTable = $('#m_table_1').dataTable();
//             var indexOfMyCol = 5;//you want it on the third column
// $("thead th").each( function ( i ) {
//     if(i === indexOfMyCol){ 
//       this.innerHTML = fnCreateSelect( oTable.fnGetColumnData(i) );
//       $('#filterStatus').change( function () {
//           console.log($(this).val());
//         oTable.fnFilter( $(this).val(), i );
//       } );
//     }
// } );
            
    $('#filterStatus').change( function () {
           console.log($(this).val());
    } );

            $('body').on('click', '.delete', function () {
              var id = $(this).attr('data-id');
              var url = $(this).attr('data-url');
              var $tr = $(this).closest($('#delete' + id).parent().parent());
              swal({
                  title: "Are you sure",
                  text: "",
                  type: "error",
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

                              }else if(data.statusCode == 502){
                                showMessage(data.message , 'error');
                              }else if (data.statusCode == 404) {
                                showMessage('not found' , 'error');
                              }else{
                                showMessage('fail' , 'error');
                              }
                          },
                          error: function(data) {
                              
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

          $('form#storeAdmin').on('submit', function (e) {
              e.preventDefault();
              var formData = new FormData(this);
              
              $.ajax({
                  type: 'POST',
                  headers: {'Authorization': '{{$access_token}}'},
                  url: $(this).attr('action'),
                  data: formData,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function (data) {
                      console.log(data);
                      if (data.statusCode == 200) {
                        showMessage('admin added successfully' , 'success');
                        location.reload();
                        Custombox.close();                          
                      }else{
                        if (data.statusCode == 502) {
                            showMessage( data.message, 'error');
                            //location.reload();
                            Custombox.close();
                        }else{
                            console.log(data);
                            showMessage('something wrong' , 'error');
                            //showMessage(data.message , 'error');
                            //redirectPage(route);
                            Custombox.close();
                        }
                    }
                  },
                  error: function (data) {
                    console.log(data);
                    showMessage('fail' , 'error');
                    Custombox.close();
                  }
              });
              return false;
          });

          //edit admin

          $('form#editAdmin').on('submit', function (e) {
              e.preventDefault();
              console.log('profile_picture', $('#oldPhoto').val());
              var formData = new FormData(this);
              
              $.ajax({
                  type: 'POST',
                  headers: { 'Authorization': '{{$access_token}}'},
                  url: $(this).attr('action'),
                  data: formData,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function (data) {
                      console.log(data);
                      if (data.statusCode == 200) {
                        showMessage('admin updated successfully' , 'success');
                        location.reload();
                        Custombox.close();
                          //$("#name" + data.id).html('inas');
                          
                      }else{
                        if (data.statusCode == 502) {
                        showMessage(data.message , 'error');
                        Custombox.close();
                          //$("#name" + data.id).html('inas');
                          
                      }else{
                        console.log(data);
                        showMessage('something wrong' , 'error');
                        Custombox.close();
                      }
                      }
                  },
                  error: function (data) {
                    console.log(data);
                        showMessage('something wrong' , 'error');
                        Custombox.close();
                  }
              });
          });

        $('body').on('click', '.elementStatus', function () {
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            var url = '{{  app('shared')->get('base_url')}}' +'/countries/activate';
            console.log(url);
            
            if(status == 1){
                status = 0;
                var type = 'error';
            }else{
                status = 1;
                var type = 'success';
            }
            
            var $tr = $(this).closest($('#elementRow' + id).parent().parent());
            swal({
                title: "Are you sure ?",
                text: "",
                type: type,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "confirm",
                cancelButtonText: "cancel",
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                closeOnConfirm: true,
                closeOnCancel: true,
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        headers: { 'Authorization': '{{$access_token}}'  },
                        url: '{{  app('shared')->get('base_url')}}' +'/admincp/activate-admin',
                        data: {id: id , status: status},
                        //dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            if (data.statusCode == 200) {
                                showMessage(data.message , type);
                                location.reload();

                                // $tr.find('td').fadeOut(1000, function () {
                                //     $tr.remove();
                                // });

                            }else if(data.statusCode == 502){
                                showMessage(data.message , 'error');
                            }else if (data.statusCode == 404) {
                                showMessage('not found' , 'error');
                            }else{
                                showMessage('fail' , 'error');
                            }


                        }
                    });
                } else {

                    // swal({
                    //     title: "cancelled",
                    //     text: "",
                    //     type: "error",
                    //     showCancelButton: false,
                    //     confirmButtonColor: "#DD6B55",
                    //     confirmButtonText: "confirm",
                    //     confirmButtonClass: 'btn-info waves-effect waves-light',
                    //     closeOnConfirm: false,
                    //     closeOnCancel: false

                    // });

                }
            });
        });

        $('body').on('click', '.resetPassword', function () {
            var id = $(this).attr('data-id');
            console.log('resetPassword',id);
            $.ajax({
                type: 'POST',
                headers: { 'Authorization': '{{$access_token}}'  },
                url: '{{  app('shared')->get('base_url')}}' +'/admincp/reset-password',
                data: {id: id },
                //dataType: 'json',
                success: function (data) {
                    console.log(data);
                    if (data.statusCode == 200) {
                      console.log(data);
                        showMessage(data.message , 'success');
                       // location.reload();
                    }else if(data.statusCode == 502){
                        showMessage(data.message , 'error');
                    }else if (data.statusCode == 404) {
                        showMessage('not found' , 'error');
                    }else{
                        showMessage('fail' , 'error');
                    }
                },
                  error: function (data) {
                    console.log(data);
                        showMessage('something wrong' , 'error');
                        //Custombox.close();
                  }
            });
            console.log('resetPassword','afterajax');
                
        });
     
        var pathURL = "file_path/";
        var dropifyElements = {};
        $('.dropify').each(function() {
            dropifyElements[this.id] = true;
        });
        var drEvent = $('.dropify').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            id = event.target.id;
            console.log('id',id);
            if(dropifyElements[id]) {
                console.log('inasss');
                var target_id = $(this).attr('data-modelId');
                console.log('target_id',target_id);
                $("#oldPhoto"+target_id).val('');

            }
        });

    });
    </script>
@endsection
