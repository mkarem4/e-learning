@extends('admin.layouts.app')
@section('content')
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
    @include('admin.layouts.message')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Exams</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Course</th> 
                                <th>Name</th>
                                <th>degree</th>
                                <th>question1</th>
                                <th>question2</th>
                                <th>question3</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exams as $exam)
                                <tr>
                                        <td>{{ $exam->name }}</td>
                                        <td>{{ $exam->degree }}</td>
                                        <td>{{ $exam->question1 }}</td>
                                        <td>{{ $exam->question2 }}</td>
                                        <td>{{ $exam->question3 }}</td>
                                    <td class="action_btns"><a href="/admincp/exams/{{$exam->id}}/edit "
                                           class="btn btn-primary">Edit</a>

                                        <form action="{{ route('exams.destroy',$exam->id) }}" method="post">
                                    {{method_field('DELETE')}}
                                        @csrf
                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                    </form>
                                    </td>

                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection


