@section('title')
School
@endsection
@extends('backend.layouts.master')
@section('style')
<!-- Apex css -->
<link href="{{ asset('backend/assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet" type="text/css" />
<!-- Slick css -->
<link href="{{ asset('backend/assets/plugins/slick/slick.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/plugins/slick/slick-theme.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <h4>Total Information</h4>
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 col-xl-3">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-primary-inverse mr-0"><i class="fa fa-users"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Students</h5>
                                    <h4 class="mb-0">{{ $students }}</h4>
                                </div>
                            </div>
                        </div>
                  
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    
                </div>

                
                <!-- End col -->
                <!-- Start col -->
             
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-12 col-xl-9">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-12 col-xl-8">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-success-inverse mr-0"><i class="feather icon-award"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Teachers</h5>
                                    <h4 class="mb-0">{{ $teachers }}</h4>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-warning-inverse mr-0"><i class="feather icon-briefcase"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Employee</h5>
                                    <h4 class="mb-0">{{$employee}}</h4>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <!-- End col -->
               
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End col -->
    </div>


    <h4>Today Student Attendence</h4>
    {{-- 2nd row  --}}
    <div class="row">

     
        <!-- Start col -->
        <div class="col-lg-12 col-xl-3">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-primary mr-0"><i class="fa fa-user-plus"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Today Present</h5>
                                    <h4 class="mb-0">{{ @$present }}</h4>
                                </div>
                            </div>
                        </div>
                  
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    
                </div>

                
                <!-- End col -->
                <!-- Start col -->
             
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-12 col-xl-9">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-12 col-xl-8">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-warning mr-0"><i class="fa fa-user-times"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Today Absent</h5>
                                    <h4 class="mb-0">{{ @$absent }}</h4>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-info mr-0"><i class="fa fa-user-secret"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Today Leave</h5>
                                    <h4 class="mb-0">{{@$leave}}</h4>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <!-- End col -->
               
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End col -->
    </div>



    {{-- 2nd row end  --}}



    {{-- 3rd row start  --}}

    <h4>Today Teachers Attendence</h4>
    <div class="row">

     
        <!-- Start col -->
        <div class="col-lg-12 col-xl-3">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-primary mr-0"><i class="fa fa-user-plus"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Today Present</h5>
                                    <h4 class="mb-0">{{ @$tpresent }}</h4>
                                </div>
                            </div>
                        </div>
                  
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6 col-xl-12">
                    
                </div>

                
                <!-- End col -->
                <!-- Start col -->
             
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-12 col-xl-9">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-12 col-xl-8">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-warning mr-0"><i class="fa fa-user-times"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Today Absent</h5>
                                    <h4 class="mb-0">{{ @$tabsent }}</h4>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <span class="action-icon badge badge-info mr-0"><i class="fa fa-user-secret"></i></span>
                                </div>
                                <div class="col-7 text-right">
                                    <h5 class="card-title font-14">Today Leave</h5>
                                    <h4 class="mb-0">{{@$tleave}}</h4>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <!-- End col -->
               
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End col -->
    </div>



    {{-- 3rd row end  --}}


   
</div>
<!-- End Contentbar -->
@endsection
@section('script')
<!-- Apex js -->
<script src="{{ asset('backend/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/apexcharts/irregular-data-series.js') }}"></script>
<!-- Slick js -->
<script src="{{ asset('backend/assets/plugins/slick/slick.min.js') }}"></script>
<!-- Custom Dashboard js -->
<script src="{{ asset('backend/assets/js/custom/custom-dashboard-school.js') }}"></script>
@endsection
