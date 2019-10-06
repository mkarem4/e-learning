@extends('admin.layouts.app')
@section('content')
    <!-- /.card-header -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard - Questions</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admincp/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Questions</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @include('admin.layouts.message')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <!-- form start -->
                <form role="form" method='post' action="{{ route('questions.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="course_id">Exam</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true" name="exam_id">
                                @foreach($exams as $exam)
                                    <option value="{{$exam->id}}">{{$exam->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="degree">Degree</label>
                            <input type="text" class="form-control" name="degree" id="degree"
                                   placeholder="Enter Degree">
                        </div>

                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" name="question"
                                   id="question"
                                   placeholder="Enter a Question">
                        </div>

                        <div class="form-group">
                            <label for="answer1">Answer 1</label>
                            <input type="text" class="form-control" name="answer1"
                                   id="answer1"
                                   placeholder="Enter an answer">
                            <input type="radio" name="is_correct" value="answer1"> The Correct Answer<br>
                        </div>

                        <div class="form-group">

                        </div>

                        <div class="form-group">
                            <label for="answer1">Answer 2</label>
                            <input type="text" class="form-control" name="answer2"
                                   id="answer1"
                                   placeholder="Enter an answer">
                            <input type="radio" name="is_correct" value="answer2"> The Correct Answer<br>
                        </div>

                        <div class="form-group">
                            <label for="answer3">Answer 3</label>
                            <input type="text" class="form-control" name="answer3"
                                   id="answer3"
                                   placeholder="Enter an answer">
                            <input type="radio" name="is_correct" value="answer3"> The Correct Answer<br>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">YouTube Link Reference</label>
                            <input type="text" class="form-control" name="youtube_link" id="exampleInputEmail1"
                                   placeholder="Enter YouTube Link">
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
