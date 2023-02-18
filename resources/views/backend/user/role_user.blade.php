@section('title')
User
@endsection
@extends('backend.layouts.master')

@section('rightbar-content')
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">

        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Role List</h5>
                    

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-dark table-bordered" >
                            <thead>
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th width="10%">Role Name</th>
                                    <th>Module List</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $key => $permission)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td class="text-white">
                                        {{ ucfirst($permission->role_name) }}
                                    </td>

                              <form method="post" class="permission_form">
                                @csrf

                                <input type="hidden" name="permission_id" value="{{$permission->id}}">
                                    <td >
                                      <div class="row">
                                       <div class="col-md-3">
                                        <input type="checkbox" name="dashboard" {{$permission->dashboard==1 ? 'checked' :'' }}>
                                        <label class="label ml-1" for="email">Dashboard </label>
                                       </div>


                                       <div class="col-md-3">
                                        <input type="checkbox" name="manage_profile" {{$permission->manage_profile==1 ? 'checked' :'' }}>
                                        <label class="label ml-1" for="email">Manage Profile </label>
                                       </div>

                                       <div class="col-md-3">
                                        <input type="checkbox" name="setup_management" {{$permission->setup_management==1 ? 'checked' :'' }}>
                                        <label class="label ml-1" for="email">Setup Management</label>
                                       </div>

                                       <div class="col-md-3">
                                        <input type="checkbox" name="student_management" {{$permission->student_management==1 ? 'checked' :'' }}>
                                        <label class="label ml-1" for="email">Student Management</label>
                                       </div>


                                       <div class="col-md-3">
                                        <input type="checkbox" name="employee_management" {{$permission->employee_management==1 ? 'checked' :'' }}>
                                        <label class="label ml-1" for="email">Employee Management</label>
                                       </div>


                                       <div class="col-md-3">
                                        <input type="checkbox" name="mark_management" {{$permission->mark_management==1 ? 'checked' :'' }}>
                                        <label class="label ml-1" for="email">Marks Management</label>
                                       </div>


                                       <div class="col-md-3">
                                        <input type="checkbox" name="account_management" {{$permission->account_management==1 ? 'checked' :'' }}>
                                        <label class="label ml-1" for="email">Account Management</label>
                                       </div>


                                       <div class="col-md-3">
                                        <input type="checkbox" name="result" {{$permission->result==1 ? 'checked' :'' }}>
                                        <label class="label ml-1" for="email">Student Result</label>
                                       </div>

                                       <div class="col-md-3">
                                        <input type="checkbox" name="report" {{$permission->report==1 ? 'checked' :'' }}>
                                        <label class="label ml-1" for="email">Report</label>
                                       </div>



                                      
                                      </div>
                                    </td>
                                   
                                    <td>
                                        <input type="submit" value="Update" class="btn btn-white">
                                    </td>

                                    </form>
                                  
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection


@section('script')
<script>
    $(document).ready(function () {
        $('.permission_form').submit(function (e) { 
            e.preventDefault();

            var data = $(this).serialize();

            $.ajax({
                type: "POST",
                url: `{{route('user.permission')}}`,
              
                _token:"{{ csrf_token() }}",
                 data:data
                ,
                
                success: function (response) {
                    toastr.success('Permission updated successfully');
                }
            });
            
        });
    });
</script>
    
@endsection