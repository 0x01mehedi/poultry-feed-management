<?php
if(isset($_POST["btnProduction"])){
  $bom=MfgBom::find($_POST["txtId"]);
  $bomdetails=MfgBomDetail::Filter($bom->id);
}else{
  $bom=new MfgBom();
}
?>

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
                <h1>Create Production</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">Create Production</a></li>
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
        <div class="invoice p-3 mb-3" style="background-color:#DEFACE;">
          <!-- title row -->
          <div class="row">
            <div class="col-12">               
                <div class="row">
                  <div class="col-6">
                    <img  src="asset/dist/img/document_logo.png" alt="PoultryFeed Logo" class="brand-image img-circle elevation-3 m-4" style="opacity: .8; width:90px; height:90px;">
                  </div>
                  <h4>
                    <strong> Poultry Feed SHOP</strong> 
                  </h4>
                  <!-- <div  class="col-6"></div>
                  <div class="col-4"></div> -->
                </div>
             
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <table>
                <tr>
                  <td><label>Code &nbsp;</label></td>
                  <td><input class="form-control" type="text" id="code" name="code" value="<?php echo $bom->code?>" /></td>              
                </tr>
                <tr>
                  <td><label>BoM Name &nbsp;</label></td>
                  <td><input class="form-control" type="text" id="name" name="name" value="<?php echo $bom->name?>" /></td>              
                </tr>

                <tr>
                  <td><label>Mfg Item &nbsp;</label></td>
                  <td><?php
                      echo Product::html_select_Finishedgoods("cmbFinishedProduct",$bom->product_id);
                      ?>
                  </td>              
                </tr>

                <tr>
                  <td><label>Build Qty &nbsp;</label></td>
                  <td><input class="form-control" type="text" id="bqty" name="bqty" value="0" placeholder="Qty to be built"  /></td>              
                </tr>

                <tr>
                <td><label>Total Labor Cost &nbsp;</label></td>
                <td><input class="form-control" type="hidden" id="labor_cost" name="labor_cost" value="<?php echo $bom->labor_cost/$bom->qty  ?>"/>
              <input class="form-control" type="text" id="total_labor_cost" name="total_labor_cost"/>
              </td>              
                </tr>

              </table>  
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">

            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              
              <table>
                <tr>
                  <td><b>BoM ID:</b></td>
                  <td><input type="text" id="bom_id" style="width:60px" value="<?php echo $bom->id ?>" readonly /></td>
                </tr>
                <tr>
                  <td><b>Date:</b></td>
                  <td><input type="text" id="txtDate" value=<?php echo $bom->date ?> /></td>
                </tr>
              </table>
              
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>SN</th>
                    <th>Raw Materials</th>
                    <th>Unit Cost</th>
                    <th>U Qty</th>
                    <th>Total Cost</th>
                    <th>Total Qty</th>
                    <th>UoM</th>
                    <th>Line Total</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="items">
                      <?php
                      $i=1;
                      $subtotal=0;
                      
						 foreach($bomdetails as $d){
              
							$line_total=$d->cost*$d->qty;
							$subtotal+=$line_total;
              $ucost=$d->cost/$bom->qty;
              $uqty=$d->qty/$bom->qty;

              echo "<tr>
                <th>".$i++."</th>
                <td class='pid' data-product_id='$d->product_id'>$d->product</td>
                <td class='u-cost'>$ucost</td>
                <td class='u-qty'>$uqty</td>
                <td class='tcost'>0</td>
                <td class='tqty'>0</td>
                <td class='uid' data-uom_id='$d->uom_id'>$d->uom</td>
                <td class='linetotal'>0</td>
              </tr>";
						 }
                      ?>
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
              <strong>Remark</strong><br>
              <textarea id="txtRemark" class="form-control"></textarea>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <!-- <p class="lead">Amount Due: < ?php //echo date("d M Y") ?></p> -->

              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <th style="width:50%; text-align:right">Material Cost:</th>
                      <td style="text-align:right" id="subtotal">0</td>
                    </tr>


                    <tr>
                      <th style="text-align:right">Net Cost:</th>
                      <td style="text-align:right" id="nettotal">0</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-12">              
              
            <!-- <a href="javascript:void(0)" onclick="print()"  rel="noopener" target="_blank" class="btn btn-warning"><i class="fas fa-print"></i> Print</a> -->
              <button type="button" id="btnProcessBuild" class="btn btn-warning float-right"><i class="far fa-credit-card"></i> Build Product </button>
              <!-- <button id="btnProcessOrder" class="btn btn-success btn-plus shadow"><i class="fas fa-plus"></i></button> -->

            </div>
          </div>
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<script>
  $(function(){


    //Show calander in textbox
    $("#txtDate").datepicker({
      dateFormat: 'dd-mm-yy'
    });
    $("#txtDueDate").datepicker({
      dateFormat: 'dd-mm-yy'
    });

    var materials=[];


    $("#btnProcessBuild").on("click", function () {

  
    let product_id = $("#cmbFinishedProduct").val();
    let bom_id = $("#bom_id").val();
    let date = $("#txtDate").val();
    let bqty =$("#bqty").val();
    let labor_cost = $("#total_labor_cost").val();
    let tcost = $(".tcost").val();

    let bomDetails = {
   
        product_id: product_id,
        bom_id: bom_id,
        production_datetime: date,
        bqty:bqty,
        labor_cost:labor_cost,
        tcost:tcost,
    };

    let qty = $("#bqty").val();
    let total_labor_cost = $("#total_labor_cost").val();

    let itemDetails = {
        qty: qty,
        labor_cost: total_labor_cost
    };

    let data = {
        bomInfo: bomDetails,
        itemInfo: itemDetails,
        productionInfo: materials
    };

    //Send the data via AJAX
    $.ajax({
        type: "POST",
        url: "api/MfgProduction/save",
        data: data,
        //contentType: "application/json",
        success: function (res) {
            console.log(res);
        }
    });
});


    $("#bqty").on("input",function(){

      let lcost=$("#labor_cost").val();
      let bqty=$(this).val();

      $("#total_labor_cost").val(lcost*bqty);

      UpdateBill();
    });

    var materials=[];
    function UpdateBill(){

      let bqty=$("#bqty").val();

      let subtotal=0;
      materials=[];
      $("#items > tr").each(function(){
        
        let ucost=$(this).find('.u-cost').text();
        let uqty=$(this).find('.u-qty').text();

        let tcost=ucost*bqty;
        let tqty=uqty*bqty
        let linetotal=tcost*tqty;
        subtotal+=linetotal;

        $(this).find('.tqty').text(tqty);
        $(this).find('.tcost').text(tcost);
        $(this).find('.linetotal').text(linetotal);

        let product_id=$(this).find('.pid').data("product_id");
        let uom_id=$(this).find('.uid').data("uom_id");

        materials.push({product_id:product_id,uom_id:uom_id,qty:tqty,cost:tcost});
      });

      $("#subtotal").text(subtotal);
      let tlaborcost=$("#total_labor_cost").val();

      let nettotal=parseFloat(subtotal)+parseFloat(tlaborcost);
      $("#nettotal").text(nettotal.toFixed(3));
    }


  });
</script>