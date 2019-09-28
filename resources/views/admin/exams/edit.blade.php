@extends('admin.layouts.app')
@section('content')
    <!-- /.card-header -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard - exams</h1>
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
                <form role="form" method='post' action="{{ route('exams.update',$exam->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                        <label for="course_id">Courses</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true"
                                    name="course_id">
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}" {{ ($course->id == $exam->course->id) ? 'selected':'' }}>
                                     {{$course->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Exam Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{ $exam->name }}" aria-describedby="emailHelp" placeholder="Enter Name">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Total Degree</label>
                            <input type="text" class="form-control" name="degree" id="exampleInputEmail1" value="{{ $exam->degree }}" aria-describedby="emailHelp" placeholder="Enter degree">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Question 1</label>
                            <input type="text" class="form-control" name="question1" id="exampleInputEmail1" value="{{ $exam->question1 }}" aria-describedby="emailHelp" placeholder="Enter question1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">question1_answer</label>
                            <input type="text" class="form-control" name="question1_answer" id="exampleInputEmail1" value="{{ $exam->question1_answer }}" aria-describedby="emailHelp" placeholder="Enter question1_answer">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Question 2</label>
                            <input type="text" class="form-control" name="question2" id="exampleInputEmail1" value="{{ $exam->question2 }}" aria-describedby="emailHelp" placeholder="Enter question21">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">question2_answer</label>
                            <input type="text" class="form-control" name="question2_answer" id="exampleInputEmail1" value="{{ $exam->question2_answer }}" aria-describedby="emailHelp" placeholder="Enter question2_answer">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Question 3</label>
                            <input type="text" class="form-control" name="question3" id="exampleInputEmail1" value="{{ $exam->question3 }}" aria-describedby="emailHelp" placeholder="Enter question3">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">question3_answer</label>
                            <input type="text" class="form-control" name="question3_answer" id="exampleInputEmail1" value="{{ $exam->question3_answer }}" aria-describedby="emailHelp" placeholder="Enter question3_answer">
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
