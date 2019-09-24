@extends('admin.layouts.app')
@section('content')
    <!-- /.card-header -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard - Courses</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admincp/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Courses</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <!-- form start -->
                <form role="form" method='post' action="{{ route('courses.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Course Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                   placeholder="Enter Name">
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                      placeholder="Enter Description " rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Course Cover</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="cover">
                                    <label class="custom-file-label" for="exampleInputFile"></label>
                                </div>
                                <div class="input-group-append">
                                    <br><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Levels</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true" name="level_id">
                                <option selected="selected" data-select2-id="3">Alabama</option>
                                <option data-select2-id="22" value="">Alaska</option>
                                <option data-select2-id="23" value="">California</option>
                                <option data-select2-id="24" value="">Delaware</option>
                                <option data-select2-id="25" value="">Tennessee</option>
                                <option data-select2-id="26" value="">Texas</option>
                                <option data-select2-id="27" value="">Washington</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.card -->
@endsection
