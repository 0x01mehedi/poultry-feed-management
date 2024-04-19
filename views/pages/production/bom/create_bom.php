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
                <h1>Create BoM</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">Create BoM</a></li>
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
                <td><input class="form-control" type="text" id="code" name="code" placeholder="Enter your code"></td>              
                </tr>
                <tr>
                <td><label>BoM Name &nbsp;</label></td>
                <td><input class="form-control" type="text" id="name" name="name" placeholder="Enter BoM Name"></td>              
                </tr>
                </tr>
                <tr>
                <td><label>Mfg Item &nbsp;</label></td>
                <td><?php
                  echo Product::html_select_Finishedgoods("cmbFinishedProduct");
                ?></td>              
                </tr>

                <tr>
                <td><label>Qty &nbsp;</label></td>
                <td><input class="form-control" type="text" id="qty" name="qty" placeholder="Enter your Qty"></td>              
                </tr>

                <tr>
                <td><label>Labor Cost &nbsp;</label></td>
                <td><input class="form-control" type="text" id="labor_cost" name="cost" placeholder="Enter Labor cost"></td>              
                </tr>

              </table>  
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">

            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <h4>  
                <small class="float-right">Date: <?php echo date("d M Y") ?></small>
              </h4>
              <table>
                <tr>
                  <td><b>BoM ID:</b></td>
                  <td><input type="text" style="width:60px" value="<?php echo Order::get_last_id() + 1; ?>" readonly /></td>
                </tr>
                <tr>
                  <td><b>BoM Date:</b></td>
                  <td><input type="text" id="txtDate" value=<?php echo date("d-m-Y"); ?> /></td>
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
                    <th>Cost</th>
                    <th>Qty</th>
                    <th>UoM</th>
                    <th>Line Total</th>
                    <th><input type="button" id="clearAll" value="Clear" /></th>
                  </tr>
                  <tr>
                    <th></th>
                    <th>
                      <?php
                      echo Product::html_selectRawmaterials("cmbRawProducts");
                      ?>
                    </th>
                    <th><input type="text" id="txtCost" /></th>
                    <th><input type="text" id="txtQty" /></th>
                    <th><?php
                      echo Uom::html_select($name="cmbUom");
                      ?></th>

                    <th></th>
                    <th><input type="button" id="btnAddToCart" value=" Add " /></th>
                  </tr>
                </thead>
                <tbody id="items">

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
              <textarea id="txtRemark"></textarea>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <p class="lead">Amount Due: <?php echo date("d M Y") ?></p>

              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <td id="subtotal">0</td>
                    </tr>


                    <tr>
                      <th>Total:</th>
                      <td id="net-total">0</td>
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
              
              <button type="button" id="btnProcessOrder" class="btn btn-danger float-right"><i class="far fa-credit-card"></i> Process Order </button>
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
  $(function() {


    //Show calander in textbox
    $("#txtDate").datepicker({
      dateFormat: 'dd-mm-yy'
    });
    $("#txtDueDate").datepicker({
      dateFormat: 'dd-mm-yy'
    });


    //Save into database table
    $("#btnProcessOrder").on("click", function() {

      if(confirm("Are you sure?")){
        
      let code = $("#code").val();
      let bom_name = $("#name").val();
      let mfg_product_id = $("#cmbFinishedProduct").val();
      let qty = $("#qty").val();
      let labor_cost = $("#labor_cost").val();
      let bom_date = $("#txtDate").val();
      let remark = $("#txtRemark").val();
      let raw_items = items;


      let _data={
          "code": code,
          "bom_name": bom_name,
          "mfg_product_id": mfg_product_id,
          "qty": qty,
          "labor_cost": labor_cost,
          "remark": remark,
          "bom_date": bom_date,
          "raw_items": raw_items
        }
        //console.log(_data);
      
      $.ajax({
        url: 'api/mfgbom/save',
        type: 'POST',
        data:_data,
        success: function(res) {
          console.log(res);
          // cart.clearCart();
          $("#items").html("");
        }
      });

    }

    });

    //Show customer other information
    

    //Show customer other information
    $("#cmbRawProducts").on("change", function() {

      $.ajax({
        url: 'api/product/find',
        type: 'GET',
        data: {
          "id": $(this).val()
        },
        success: function(res) {
          console.log(res);
          let data = JSON.parse(res);
          let product=data.product; //s hobe na check

          $("#txtCost").val(product.offer_price);
          $("#txtQty").val(1);
        }
      });

    }); //  


    //Add item to bill temporarily       

    var items=[];
    $("#btnAddToCart").on("click", function() {

      let product_id = $("#cmbRawProducts").val();
      let name = $("#cmbRawProducts option:selected").text();

      let uom_id = $("#cmbUom").val();
      let uom_name = $("#cmbUom option:selected").text();  
      
      let cost = $("#txtCost").val();
      let qty = $("#txtQty").val();


      let item = {
        "name": name,
        "product_id": product_id,
        "uom_id": uom_id,
        "uom_name": uom_name,
        "cost": cost,
        "qty": parseFloat(qty)
      };

      items.push(item);

      printCart(items);

    });

    $("body").on("click", ".delete", function() {

      let product_id=$(this).data("id");
      // console.log(product_id);

      items=items.filter(item=>{
        if(item.product_id!=product_id){
          return item;
        }
      });
      printCart(items);

    });

    $("#clearAll").on("click", function() {
      items=[];
    });


    //------------------Cart Functions----------//     


    function printCart(items) {

      let html="";

      items.forEach((item,i)=>{
        html+=`<tr><td>${i+1}</td><td>${item.name}</td><td>${item.cost}</td><td>${item.qty}</td><td>${item.uom_name}</td><td><input class='delete' type='button' value='Del' data-id='${item.product_id}' /></td></tr>`;
      });

      $("#items").html(html);

    }



  });
</script>

