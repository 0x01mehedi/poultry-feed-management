<style>
    #cmbCustomer{
        padding: 5px;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sales Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">Sales Report</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12" style="background-color:#DEFACE;">
        <!-- Main content -->  


          <div class="col-12 m-3 text-center">
                      <!-- title row -->
            <h4><strong>Enter your date here</strong></h4><br>
            <form method="post" action="">
                <strong>Date :</strong> <input type="date" name="date">
                <input type="submit" value="Submit" class="btn btn-warning">
            </form><br>
        </div>

        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];  

   echo Order::item_wise_sales_report($date);
 }
?>








<?php
// $product_id = 1;  
// $date = '2024-01-28'; 
// echo Order::item_wise_sales_report($date);
?>


<?php
//$product_id = 123;  // Replace with the actual product ID
///$date = '2024-01-28';  // Replace with the actual date
//echo Order::item_wise_sales_report($product_id, $date);
?>


<!-- <!DOCTYPE html>
<html>
<head>
    <title>Your Form Page</title>
</head>
<body>
    <div class="container">
        <div class="row m-3">
            <h4><strong>Enter your date here</strong></h4><br>
            <form method="post" action="">
                Date: <input type="date" name="date">
                <input type="submit" value="Submit">
            </form><br>
        </div>
    </div>
</body>
</html>  -->

<?php

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $date = $_POST["date"];  

//    echo Order::item_wise_sales_report($date);
//  }
?>