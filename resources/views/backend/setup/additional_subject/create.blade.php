@section('title')
Assign Additional Subject
@endsection
@extends('backend.layouts.master')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
@section('rightbar-content')
<div class="contentbar">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Assign Additional Subject</h5> 
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="d-flex">
                            <div class="form-group col-md-4">
                                <label for="class_id">Class <span class="text-danger">*</span></label>
                                <select class="form-control" id="class_id" name="class_id">
                                    <option value="">Select Class</option>
                                    @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="year_id">Year<span class="text-danger">*</span></label>
                                <select class="form-control" id="year_id" name="year_id">
                                    <option value="">Select Year</option>
                                    @foreach($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->year }}</option>
                                    @endforeach
                                </select>
                                @error('year_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <button type="button" id="search" class="btn btn-success" style="margin-top: 32px">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   $(document).on('click','#search', function(){
        let class_id = $('#class_id').val();
        let year_id = $('#year_id').val();

        $.ajax({
            url: 'additional/search/student',
            type: 'GET',
            data: {
                'year_id' = year_id,
            },
        });
   });
</script>
@endsection