@section('title')
Student Payment
@endsection
@extends('backend.layouts.master')
@section('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="{{ asset('backend/assets/js/base64logo.js') }}"></script>
<script>
    function downloadPDF(){
        let name = document.getElementById("sname").textContent;
        let id = document.getElementById("sid").textContent;
        let roll = document.getElementById("sroll").textContent;
        let sfname = document.getElementById("sfname").textContent;
        let sclass = document.getElementById("sclass").textContent;
        let syear = document.getElementById("syear").textContent;
        let sgroup = document.getElementById("sgroup").textContent;
        let sfeetype = document.getElementById("sfeetype").textContent;
        let sfeeamount = document.getElementById("sfeeamount").textContent;
        let sdiscount = document.getElementById("sdiscount").textContent;
        let sdiscountamount = document.getElementById("sdiscountamount").textContent;
        let stotalamount = document.getElementById("stotalamount").textContent;
        let e = document.getElementById("exam_type_id");
        let value = e.value;
        let exam = e.options[e.selectedIndex].text;
        let date = document.getElementById("pay-date").value;
        // alert(text);
        let str1 = 'Fee Type : Monthly Fee';
        let str2 = sfeetype;

        const monthArray = ["January","February","March","April","May","June","July",
        "August","September","October","November","December"];

        let d = new Date(date);

        if(!!d.valueOf()){
           month = d.getMonth();
           year = d.getFullYear();
        }
        if(str1.toUpperCase() == str2.toUpperCase()){
            monthfee = monthArray[month];
        }
        else{
            monthfee = '';
        }
        if(exam == 'Select Exam'){
            exam = '';
        }
        let printDate = new Date().toLocaleString();

        let doc = new jsPDF('p', 'mm', 'a6');
        doc.setFontSize(10);
        doc.addImage(logo, 'JPEG', 5, 4, 30, 25);
        doc.text(35, 10, "Unique Model School");
        doc.text(35, 15, "Address: Shajadpur, Sirajganj");
        doc.text(35, 20, "Email: uniquemodelschool14@gmail.com");
        doc.text(35, 25, "Phone: 017299619595");
        doc.text(10, 40, name);
        doc.text(10, 45, id);
        doc.text(10, 50, roll);
        doc.text(10, 55, sfname);
        doc.text(10, 60, sclass);
        doc.text(10, 65, syear);
        doc.text(10, 70, sgroup);
        doc.text(10, 75, sfeetype);
        doc.text(10, 80, "Exam : " + exam);
        doc.text(10, 85, "Payment of Month : " + monthfee);
        doc.text(10, 90, "Payment of Year : " + year);
        doc.text(10, 95, sfeeamount);
        doc.text(10, 100, sdiscount);
        doc.text(10, 105, sdiscountamount);
        doc.text(10, 110, stotalamount);
        doc.text(48, 147, "Print Date : "+printDate);
        doc.save("student-payment-slip.pdf");
    }
</script>
@endsection
@section('rightbar-content')
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div>
                    <div class="card-header">
                        <h5 class="card-title">Student Search</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('student.payment.store') }}" method="POST" id="payment-form">
                            @csrf
                            <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="year_id">Year</label>
                                        <select id="year_id" name="year_id" class="form-control">
                                            <option selected="">Choose...</option>
                                            @foreach ($years as $year)
                                            <option value="{{ $year->id }}">{{ $year->year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="class_id">Class</label>
                                        <select id="class_id" name="class_id" class="form-control">
                                            <option selected="">Choose...</option>
                                            @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="fee_category_id">Fee Type</label>
                                        <select id="fee_category_id" name="fee_category_id" class="form-control">
                                            <option selected="">Choose...</option>
                                            @foreach ($fees as $fee)
                                            <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="id_no">Student Id</label>
                                        <input type="text" name="id_no" id="id_no" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3">
                                    <button type="button" id="search" class="btn btn-success">Search</button>
                                    </div>
                            </div>
                                <div class="d-none" id="student-data">

                                </div>
                            <br><div class="d-none" id="payment-data">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="feeId"><strong>Fee Type</strong></label>
                                        <select id="feeId" name="fee_category_id" class="form-control">
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><strong>Payment Date</strong></label>
                                        <input type="date" name="payment_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="d-none" id="examfee">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="examfeeId"><strong>Fee Type</strong></label>
                                        <select id="examfeeId" name="fee_category_id" class="form-control">
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="examfeeId"><strong>Select Exam</strong></label>
                                        <select id="exam_type_id" name="exam_type_id" class="form-control">
                                            <option value="">Select Exam</option>
                                            @foreach ($exams as $exam)
                                                <option id="exam_name" value="{{ $exam->id }}">{{ $exam->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><strong>Payment Date</strong></label>
                                        <input type="date" name="payment_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="d-none" id="otherfee">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="otherfeeId"><strong>Fee Type</strong></label>
                                        <select id="otherfeeId" name="fee_category_id" class="form-control">
                                           
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><strong>Payment Date</strong></label>
                                        <input type="date" name="payment_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="d-none" id="submitbutton">
                                <button  class="btn btn-danger" id="sub-btn" onclick="downloadPDF()">Confirm Payment</button>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).on('click','#search',function(){
        let year_id = $('#year_id').val();
        let class_id = $('#class_id').val();
        let id_no = $('#id_no').val();
        let fee_category_id = $('#fee_category_id').val();

        $.ajax({
            url: "{{ route('student.payment.search') }}",
            type: "GET",
            data:{
                'year_id': year_id,
                'class_id':class_id,
                'id_no':id_no,
                'fee_category_id': fee_category_id,
            },
            success:function(response){
                let html = '';
                $('#student-data').removeClass('d-none');
                html += '<h3>Student Information</h3>'+
                        '<input type="hidden" name="student_id" id="student_id" value="' + response.student.student_id + '"/>' +
                        '<br>'+
                        '<span id="sname"><strong>Student Name :</strong> '+response.student.student.name+'</span>'+
                        '<br>'+
                        '<span id="sid"><strong>Student Id :</strong> '+response.student.student.id_no+'</span>'+
                        '<br>'+
                        '<span id="sroll"><strong>Student Roll :</strong> '+response.student.roll+'</span>'+
                        '<br>'+
                        '<span id="sfname"><strong>Father Name :</strong> '+response.student.student.fname+'</span>'+
                        '<br>'+
                        '<span id="sclass"><strong>Class :</strong> '+response.student.student_class.name+'</span>'+
                        '<br>'+
                        '<span id="syear"><strong>Year :</strong> '+response.student.student_year.year+'</span>'+
                        '<br>'+
                        '<span id="sgroup"><strong>Group :</strong> '+response.student.group.group_name+'</span>'+
                        '<br>'+
                        '<span id="sfeetype"><strong>Fee Type :</strong> '+response.feeAmount.fee_category.name+'</span>'+
                        '<br>'+
                        '<span id="sfeeamount"><strong>Amount :</strong> '+response.feeAmount.amount+'</span>'+
                        '<br>'+
                        '<span id="sdiscount"><strong>Discount :</strong> '+response.student.discount.discount+'%</span>'+
                        '<br>'+
                        '<span id="sdiscountamount"><strong>Discount Amount :</strong> '+response.discount_amount+'</span>'+
                        '<br>'+
                        '<span id="stotalamount"><mark style="background-color:yellow;"><strong>Amount For This Student :</strong> '+response.final_amount+'</mark></span>'+
                        '<input type="hidden" name="amount" value="' + response.final_amount + '"/>' +
                        '<br>'+
                        '<br>'+
                        '<label>Payment of Year/Month/Date</label>'+
                        '<input type="date" name="date" id="pay-date" class="form-control col-md-6" required>' +
                        '<br>'+
                        '<br>'+
                        '<button type="button" class="btn btn-warning" id="payment-button">Take Payment</button>'
                html = $('#student-data').html(html);
            }
        });
    });
</script>

<script>
    $(document).on('click','#payment-button',function(){
        
        let fee_category_id = $('#fee_category_id').val();
        $.ajax({
            url: "{{ route('student.fee.search') }}",
            type: "GET",
            data:{
                'fee_category_id': fee_category_id
            },
            success:function(response){
                if(response.id == fee_category_id && response.id == 2)
                {
                    $('#examfee').addClass('d-none');
                    $('#otherfee').addClass('d-none');
                    $('#payment-data').removeClass('d-none');
                    let html = '';
                    html += '<option value="'+response.id+'">'+response.name+'</option>';
                    html = $('#feeId').html(html);
                }
                else if(response.id == fee_category_id && response.id == 4)
                {
                    $('#otherfee').addClass('d-none');
                    $('#payment-data').addClass('d-none');
                    $('#examfee').removeClass('d-none');
                    let html1 = '';
                    html1 += '<option value="'+response.id+'">'+response.name+'</option>';
                    html1 = $('#examfeeId').html(html1);
                }
                else
                {
                    $('#payment-data').addClass('d-none');
                    $('#examfee').addClass('d-none');
                    $('#otherfee').removeClass('d-none');
                    let html2 = '';
                    html2 += '<option value="'+response.id+'">'+response.name+'</option>';
                    html2 = $('#otherfeeId').html(html2);
                }
            }
        });
        $('#submitbutton').removeClass('d-none');
    });
</script>

{{-- <script>
    $(document).on('click','#month_fee_button',function(){
        let date = $('#monthinput').val();
        $('#payment_year_month').val(date);
    });
</script> --}}

<script>
    $(document).on('click','#sub-btn',function(){
        let examInput = $('#exam_type_id').val();

        if($('#examfee').is(":visible") && examInput == ''){
            $('#exam_type_id').attr('required',true);
        }
    });
</script>

</div>
@endsection