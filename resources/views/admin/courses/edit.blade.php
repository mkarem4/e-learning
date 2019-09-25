@extends('admin.layouts.app')
@section('content')
    <!-- /.card-header -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard - levels</h1>
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
                <form role="form" method='post' action="{{ route('courses.update',$course->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">course Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{ $course->name }}" aria-describedby="emailHelp" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">course Description</label>
                            <input type="text" class="form-control" name="description" id="exampleInputEmail1" value="{{ $course->description }}" aria-describedby="emailHelp" placeholder="Enter Description">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">course Cover</label>
                            <input type="text" class="form-control" name="cover" id="exampleInputEmail1" value="{{ $course->cover }}" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                        <label for="level_id">Levels</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="level_id">
                                <option selected="selected" data-select2-id="3">Select Level</option>
                                @foreach($levels as $level)
                                    <option value="{{$level->id}}" >{{$level->name}}</option>
                                @endforeach
                            </select>
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
