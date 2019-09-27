@extends('admin.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard - Instructors</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admincp/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Instructors</li>
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
                        <h3 class="card-title">Instructors</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($instructors as $instructor)
                                <tr>
                                        <td>{{ $instructor->name }}</td>
                                        <td>{{ $instructor->email }}</td>
                                        <td>{{ $instructor->level->name }}</td>
                                        <td>
                                            <form action="{{ route('instructors.destroy',$instructor->id) }}" method="POST">
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


