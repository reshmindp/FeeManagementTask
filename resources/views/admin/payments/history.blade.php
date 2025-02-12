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
                                    <h4 class="mb-sm-0 font-size-18">Payment History</h4>

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
                                            <h4 class="mb-sm-0 font-size-18">Payment History - {{ $student->name }}</h4>
                                            
                                        </div>
                                       
                                        <div class="mb-4"></div>
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sl #</th>
                                                <th>Date of Payment</th>
                                                <th>Amount Paid</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($payments as $pay)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ \Carbon\Carbon::parse($pay->date_of_payment)->format('d M Y') }}</td>
                                                <td>{{ $pay->amount_paid}}</td>
                                                
                                                
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