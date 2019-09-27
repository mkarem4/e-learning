@extends('admin.layouts.app')
@section('content')
    <!-- /.card-header -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard - materials</h1>
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
                <form role="form" method='post' action="{{ route('materials.update',$material->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                        <label for="course">Courses</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true"
                                    name="course_id">
                                @foreach($courses as $course)
                                    <option
                                        value="{{$course->id}}" {{ ($course->id == $material->course->id) ? 'selected':'' }}>
                                        {{$course->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Material Name</label>
                            <input type="text" class="form-control" name="name"  id="exampleInputEmail1" value="{{ $material->name }}" aria-describedby="emailHelp" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chapter Name</label>
                            <input type="text" class="form-control" name="chapter" id="exampleInputEmail1" value="{{ $material->chapter }}" aria-describedby="emailHelp" placeholder="Enter Chapter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Note</label>
                            <input type="text" class="form-control" name="note" id="exampleFormControlTextarea1" value="{{ $material->note }}" aria-describedby="emailHelp" placeholder="Enter Note">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="file"
                                           value="{{ $material->file }}">
                                    <label class="custom-file-label" for="exampleInputFile"></label>
                                </div>
                                <div class="input-group-append">
                                    <br><br>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">YouTube Link</label>
                            <input type="text" class="form-control" name="YouTube Link" id="exampleInputEmail1" value="{{ $material->youtube_link }}" aria-describedby="emailHelp">
                        </div>

                        
                    </div>


                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.card -->
@endsection
