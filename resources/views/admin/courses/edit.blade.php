@extends('admin.layouts.master')
@section('content')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Courses</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Courses</a></li>
                                            <li class="breadcrumb-item active">Edit Courses</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Edit Courses</h4>

                                        <form action="{{route('courses.update', $course->id)}}" id="coursesForm" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="row">   
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Name @error('name') <span class="text-danger"> {{ $message }} </span> @enderror</label>
                                                        <input type="text" name="name" maxlength="100" value="{{old('name',$course->name)}}" class="form-control" placeholder="Enter course name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Duration @error('duration') <span class="text-danger"> {{ $message }} </span> @enderror</label>
                                                        <input type="text" name="duration" value="{{old('duration',$course->duration)}}" class="form-control" placeholder="Enter duration">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Fee per month @error('fee_per_month') <span class="text-danger"> {{ $message }} </span> @enderror</label>
                                                        <input type="text" name="fee_per_month" value="{{old('fee_per_month', $course->fee_per_month)}}" class="form-control" placeholder="Enter Fee per month">
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-primary w-md">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                
                @include('admin.layouts.footer')
            </div>
            <!-- end main content-->

@endsection
