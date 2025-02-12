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
                                    <h4 class="mb-sm-0 font-size-18">Students</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Students</a></li>
                                            <li class="breadcrumb-item active">Edit Students</li>
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
                                        <h4 class="card-title mb-4">Edit Student</h4>

                                        <form action="{{route('students.update', $student->id)}}" id="studentsForm" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="row">   
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Name @error('name') <span class="text-danger"> {{ $message }} </span> @enderror</label>
                                                        <input type="text" name="name" maxlength="100" value="{{old('name',$student->name)}}" class="form-control" placeholder="Enter client name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email @error('email') <span class="text-danger"> {{ $message }} </span> @enderror</label>
                                                        <input type="text" name="email" maxlength="200" value="{{old('email',$student->email)}}" class="form-control" placeholder="Enter email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Phone @error('phone') <span class="text-danger"> {{ $message }} </span> @enderror</label>
                                                        <input type="number" name="phone" maxlength="10" value="{{old('phone',$student->phone)}}" class="form-control" placeholder="Enter phone number">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Date of birth @error('dob') <span class="text-danger"> {{ $message }} </span> @enderror</label>
                                                        <input type="date" name="dob" value="{{old('dob',$student->dob)}}" class="form-control" placeholder="Enter date of birth">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Address @error('address') <span class="text-danger"> {{ $message }} </span> @enderror</label>
                                                        <textarea class="form-control" placeholder="Enter address" name="address">{{$student->address}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Course @error('course_id') <span class="text-danger"> {{ $message }} </span> @enderror</label>
                                                        <select name="course_id" id="course_id" class="form-control select2-search-disable">
                                                            <option value="">Select a course</option>
                                                            @foreach($courses as $course)
                                                            <option {{ old('course_id', $student->course_id) == $course->id ? 'selected' : '' }} value="{{ $course->id }}"> {{ $course->name }} </option>
                                                            @endforeach
                                                        </select>
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
