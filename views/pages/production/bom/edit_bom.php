<?php
if(isset($_POST["btnDetails"])){
	$purchase=Purchase::find($_POST["txtId"]);
  $supplier=Supplier::find($purchase->supplier_id);
}
?>


<style>
    select {
        padding: 5px;
        min-width: 200px;
    }

    textarea {
        width: 100%;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>MfgBom Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">MfgBom Details</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row mb-3">
                    <div class="row mb-3">
                        <h4>  
                          
                        </h4>
                      <div class="col-12 my-3">
                      <small class="float-right mt-0">Date: <?php echo $mfgbom->$mfgbom_date; ?></small>
                        <img  src="asset/dist/img/document_logo.png" alt="PoultryFeed Logo" class="brand-image img-circle elevation-3 ml-5" style="opacity: .8; width:90px; height:90px;">    
                      </div>
                    </div>
                        <div class="col-12 my-3">
                            <small class="float-right mt-0">Date: <?php //echo $bom->date; ?></small>
                        </div>
                    </div>

                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <!-- Display relevant details here -->
                            <table>
                                <tr><td><b>BOM ID:</b></td><td><input type="text" style="width:60px" value="<?php echo $bom->id; ?>" readonly/></td></tr>
                                <tr><td><b>Code:</b></td><td><input type="text" value="<?php echo $bom->code; ?>" readonly/></td></tr>
                                <tr><td><b>Name:</b></td><td><input type="text" value="<?php echo $bom->name; ?>" readonly/></td></tr>
                                <!-- Add more details as needed -->
                            </table>
                        </div>

                        <!-- Display other details and BOM items here -->
                    </div>

                    <!-- Table row for BOM items -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Cost</th>
                                        <!-- Add more columns if needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($bom_details as $item) {
                                        echo "<tr><th>" . $i++ . "</th>
                                            <td>{$item->product_id}</td>
                                            <td>{$item->qty}</td>
                                            <td>{$item->cost}</td>
                                            <!-- Add more columns if needed -->
                                            </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Additional details row -->
                    <div class="row">
                        <div class="col-12">
                            <strong>Remark</strong><br>
                            <textarea id="txtRemark" readonly><?php echo $bom->remark; ?></textarea>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

