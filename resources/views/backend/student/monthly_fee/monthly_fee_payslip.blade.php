<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Details</title>
    {{-- <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');

        @page{
            margin: 0;
            size: landscape;
        }
        body{
            font-family: 'Roboto', sans-serif;
            /* height: auto;
            width: auto; */
        }
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: 'Roboto', sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
    </style> --}}
</head>

<body>
    <div class="container">
        <div style="text-align: center">
            <a><img src="{{ public_path('uploads/ums.jpg') }}"  style="width:60px; height:60px;  margin-left:0px;"></a>
        </div>
        <div style="font-size: 12px; text-align:center">
            <h1><b>Unique Model School</b></h1>
            <span>Address: Shajadpur, Sirajganj</span><br>
            <span>Email: uniquemodelschool14@gmail.com</span><br>
            <span>Phone: 017299619595</span><br>
            <span><strong>Monthly Pay Slip</strong></span><br>
        </div>

        @php
        $registration_fee = \App\Models\FeeCategoryAmount::where('fee_category_id', 2)
        ->where('class_id', $details->class_id)
        ->first();
        $originalFee = $registration_fee->amount;
        $discount = $details['discount']['discount'];
        $discountableFee = $discount/100*$originalFee;
        $totalFee = (float)$originalFee - (float)$discountableFee;
        @endphp

        <div class="student-details">
            <div class="row">
                <div class="col-md-12">
                    <div class="bd-example">
                        <br><br><span style="font-size:10px;">Student Name: {{ $details['student']['name']  }}</span><br>
                        <span style="font-size:10px;">Father's Name: {{ $details['student']['fname']   }}</span><br>
                        <span style="font-size:10px;">Student Id: {{ $details['student']['id_no']   }}</span><br>
                        <span style="font-size:10px;">Session: {{ $details['student_year']['year']  }}</span><br>
                        <span style="font-size:10px;">Class: {{ $details['student_class']['name']  }}</span><br>
                        <span style="font-size:10px;">Monthly Fee: {{ $originalFee  }}</span><br>
                        <span style="font-size:10px;">Discount: {{ $discount }}</span><br>
                        <span style="font-size:10px;">Fee For this Student of {{ $month }}: {{$totalFee}}</span><br>
                        <br><i style="font-size: 10px;">Print date: {{ date("d M Y") }}</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
