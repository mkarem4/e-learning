@extends('admin.layouts.app')
@section('content')
    <!-- /.card-header -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard - Materials</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admincp/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Materials</li>
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
                            <label for="exampleInputEmail1">Material Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                   placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Chapter</label>
                            <input type="text" class="form-control" name="chapter" id="exampleInputEmail1"
                                   placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">YouTube Link</label>
                            <input type="text" class="form-control" name="youtube_link" id="exampleInputEmail1"
                                   placeholder="Enter Name">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputFile">Files</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                                    <label class="custom-file-label" for="exampleInputFile"></label>
                                </div>
                                <div class="input-group-append">
                                    <br><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level_id">Course</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="course_id">
                                <option selected="selected" data-select2-id="3">Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}" >{{$course->name}}</option>
                                @endforeach
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
