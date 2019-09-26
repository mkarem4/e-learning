@extends('admin.layouts.app')
@section('content')
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Materials</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Instructor</th>
                                <th>Course</th>
                                <th>Chapter</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @foreach($courses as $course)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $course->name }}</td>--}}
{{--                                    <td>{{ $course->description }}</td>--}}
{{--                                    <td>{{ $course->instructor->name }}</td>--}}
{{--                                    <td>{{ $course->level->name }}</td>--}}
{{--                                    <td class="action_btns"><a href="/admincp/courses/{{$course->id}}/edit "--}}
{{--                                                               class="btn btn-primary">Edit</a>--}}

{{--                                        <form action="{{ route('courses.destroy',$course->id) }}">--}}
{{--                                            {{method_field('DELETE')}}--}}
{{--                                            @csrf--}}
{{--                                            <input type="submit" class="btn btn-danger" value="Delete"/>--}}
{{--                                        </form>--}}
{{--                                    </td>--}}

{{--                                </tr>--}}
{{--                            @endforeach--}}


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


