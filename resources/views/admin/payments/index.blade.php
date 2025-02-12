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
                                    <h4 class="mb-sm-0 font-size-18">Payments</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a>Modules</a></li>
                                            <li class="breadcrumb-item active">Payments</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <div class="d-flex justify-content-between align-items-center" data-kt-subscription-table-toolbar="base">
                                            <h4 class="mb-sm-0 font-size-18">All Students Payments</h4>
                                            
                                        </div>
                                       
                                        <div class="mb-4"></div>
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sl #</th>
                                                <th>Name</th>
                                                <th>Course</th>
                                                <th>Fee per month</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($students as $student)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->courses->name }}
                                                </td>
                                                <td>{{ $student->courses->fee_per_month }}</td>
                                                <td>
                                                    <ul class="list-unstyled hstack gap-1 mb-0">

                                                        @if($student->status ==1)
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Pay">
                                                            <a href="{{route('payments.edit', $student->id)}}" class="btn btn-sm btn-soft-warning"><i class="mdi mdi-pencil-outline"></i></a>
                                                        </li>

                                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Payment History">
                                                            <a href="{{route('payments.show', $student->id)}}" class="btn btn-sm btn-soft-primary"><i class="mdi mdi-eye-outline"></i></a>
                                                        </li>
                                                        @else
                                                        Student Inactive
                                                        @endif
                                                        {{-- <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-soft-danger" onclick="confirmDelete(event, this.closest('form'))"><i class="mdi mdi-delete-outline"></i></button>
                                                            </form>
                                                        </li> --}}
                                                    </ul>
                                                </td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <!-- Scrollable modal -->
                        <div class="modal fade bs-example-modal-xl" id="modalShowDetails" tabindex="-1" role="dialog" aria-labelledby="modalShowDetailsTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalShowDetailsTitle">Work Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-5">
                                        <div class="row">
                                            <label><b>Title:</b></label>
                                            <p id="work-title"></p>                                                         
                                        </div> 
                                        <div class="row">
                                            <label><b>Content:</b></label>
                                            <p id="content"></p>                                                         
                                        </div> 
                                        <div class="row">
                                            <label><b>Thumbnail Image</b></label>
                                            <img id="thumbnail-image" class="img-fluid">
                                            <p id="thumbnail-image-error"></p>
                                        </div>  
                                        <div class="row">
                                            <label><b>Banner Image</b></label>
                                            <img id="banner-image" class="img-fluid">
                                            <p id="banner-image-error"></p>
                                        </div>   
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        
                                        </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                @include('admin.layouts.footer')
            </div>
            <!-- end main content-->
@endsection