@section('title')
Assign Additional Subject
@endsection
@extends('backend.layouts.master')
@section('style')

@endsection
@section('rightbar-content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<div class="contentbar">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header d-flex">
                    <h5 class="card-title">Additional Subject Students</h5>
                    <div style="margin-left:540px;" class="d-flex">
                        <p style="margin-top:5px;">Assign additional subject :&nbsp;</p>
                        <a href="{{ route('additional.create') }}" class="btn btn-success btn-sm"><i class="fa solid fa-plus"></i>&nbsp;Assign</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection