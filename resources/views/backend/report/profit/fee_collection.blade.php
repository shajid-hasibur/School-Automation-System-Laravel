@section('title')
School Fee Collection 
@endsection
@extends('backend.layouts.master')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
@endsection
@section('rightbar-content')
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Student Fee Collection</h5>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="">Start Date</label>
                            <input type="date" id="start-date" name="start_date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">End Date</label>
                            <input type="date" id="end-date" name="end_date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <button type="button" id="search" class="btn btn-primary" style="margin-top: 31px; margin-left:10px">Search</button>
                        </div>
                    </div>
                    <br><br><div class="d-none" id="search-amount-total">

                    </div>
                    <div class="col-md-12" style="margin-top: 100px">
                        <span><strong>Collection By This Year : {{ $current_year_collection."/-"." BDT" }}</strong></span><br>
                        <span><strong>Collection By This Month : {{ $current_month_collection."/-"." BDT" }}</strong></span>
                    </div>
                </div>    
            </div>    
        </div>    
    </div>    
</div>
<script>
    $(document).on('click','#search',function(){
        let start_date = $('#start-date').val();
        let end_date = $('#end-date').val();

        $.ajax({
            url: "{{ route('get.collection.report') }}",
            type: "GET",
            data:{
                'start_date': start_date,
                'end_date': end_date
            },
            success:function(response){
                // console.log(response.currentYearCollection);
                let html = '';
                $('#search-amount-total').removeClass('d-none');
                html = '<mark style="background-color:black;color:white"><span>Total '+response.collection+'/- BDT collected from start date to end date</span></mark>';
                html = $('#search-amount-total').html(html);
            }
        });
        
    });
</script>    
@endsection