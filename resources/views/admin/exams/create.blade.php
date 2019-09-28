@extends('admin.layouts.app')
@section('content')
    <!-- /.card-header -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard - Exams</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admincp/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Exams</li>
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
                <form role="form" method='post' action="{{ route('exams.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                     <div class="form-group">
                            <label for="course_id">Courses</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="course_id">
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}" >{{$course->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Exam Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                   placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Total Degree</label>
                            <input type="text" class="form-control" name="degree" id="exampleInputEmail1"
                                   placeholder="Enter Degree">
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlTextarea1">Question 1</label>
                            <textarea class="form-control" name="question1" id="exampleFormControlTextarea1"
                                      placeholder="Enter question1 " rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">question Answer</label>
                            <input type="exampleFormControlTextarea1" class="form-control" name="question1_answer" id="exampleFormControlTextarea1"
                                   placeholder="Enter Answer">
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlTextarea1">Question 2</label>
                            <textarea class="form-control" name="question2" id="exampleFormControlTextarea1"
                                      placeholder="Enter question2 " rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">question Answer</label>
                            <input type="exampleFormControlTextarea1" class="form-control" name="question2_answer" id="exampleFormControlTextarea1"
                                   placeholder="Enter Answer">
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlTextarea1">Question 3</label>
                            <textarea class="form-control" name="question3" id="exampleFormControlTextarea1"
                                      placeholder="Enter question3 " rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Question Answer</label>
                            <input type="exampleFormControlTextarea1" class="form-control" name="question3_answer" id="exampleInputEmail1"
                                   placeholder="Enter Answer">
                        </div>
					</div>
                
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.card -->
@endsection
