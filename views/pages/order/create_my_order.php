<!-- Content Header (Page Headaer) -->
<section class="contend-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Create Order</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create Order</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <!-- Main Content -->
        <div class="invoice p-3 mb-2">
          <!-- Title row -->
          <div class="row">
            <div class="col-12">
              <h4>
                <i class="fas fa home"></i>My Won Document.
                <small class="float-end">Date: <?php echo date("D m Y"); ?></small>
              </h4>
            </div>
          </div> <!-- Col -->
          <!-- Doc Info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From:
              <address>
              <strong>My INC.Corp</strong><br>
              Uttara,Dhaka-1230 <br>
              0188734584 <br>
              info@inc.co <br>              
              </address>
            </div>
            <!-- col -->
            <div class="col-sm-4 invoice-col">
              Customer:
              <address>
                <?php echo Customer::html_select("cmbCustomer"); ?>

                <div class="customer-info"></div>
              </address>
              <div>
                Shipping Address: <br>
                <textarea class="txtShippingAddress"></textarea>

              </div>
            </div>
            
            <div class="col-sm-4 invoice-col">
              <table>
                <tr>
                  <td><b>Order ID:</b></td>
                  <td><input type="text" style="width=60px" value="<?php echo Order::get_last_id() + 1; ?>" readonly></td>
                </tr>
                <tr>
                <td><b>Order Date:</b></td>
                  <td><input type="text" id="txtOrderDate" value="<?php echo date("d-m-Y")?>" ></td>
                </tr>
                <tr>
                <td><b>Due Date :</b></td>
                  <td><input type="text" id="txtDueDate" value="<?php echo date("d-m-Y")?>" ></td>
                </tr>
              </table>
            </div>
            <!-- Col/ -->

          </div>
        <!-- Row// -->

        <!--  Table row -->
        <div class="row">
          <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>SN</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Discount</th>
                    <th>Subtotal</th>
                    <th><input type="button" id="clearAll" value="clear"></th>
                  </tr>
                  <tr>
                    <th></th>
                    <th><?php  ?></th>
                    <th><input type="text" id="txtPrice"></th>
                    <th><input type="text" id="txtQty"></th>
                    <th><input type="text" id="txtDiscount"></th>
                    <th></th>
                    <th><input type="button" id="btnAddToCart" value="+"></th>
                  </tr>
                </thead>
                <tbody id="items">

                </tbody>
              </table>
          </div>
            <!-- Col/ -->
        </div>
        <!-- Row// -->

        <div class="row">
          <div class="col-6">
            <strong>Remark;</strong> <br>
              <textarea id="txtRemark"></textarea>
          </div>
          <div class="col-6">
            <p class="lead">Amount of Due 11/01/24</p> <br>
            <table class="table">
                <thead>
                  <tr>
                    <th style="50%">Subtotal:</th>
                    <td id="subtotal">0</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td id="net-total">0</td>
                  </tr>
                </thead>
              </table>
          </div>
            <!-- Col/ -->
        </div>
        <!-- Row// -->

        <!-- this row for printing acction buttons -->
        <div class="row">
          <div class="col-12">
            <a href="invoice.html" rel="noopener" target="_blank" class="btn btn-info" ><i class="fas fa-print"></i>Print</a>
            <button type="button" id="btnProcessOrder" class="btn btn-success float-end"><i class="fas fa-credit-card"></i> Process Order</button>
            <button type="button" class="btn btn-primary float-end" style="margin-right: 6px;"><i class="fas fa-download"></i> Generate PDF</button>
          </div>
            <!-- Col/ -->
        </div>
        <!-- Row// -->


      </div><!-- Invoice -->
        
      </div><!-- .col/ -->
    </div><!-- .row/ -->
  </div><!-- .content fluid -->
</section><!-- Section -->

<script>
  $(function(){
    const cart = new Cart("Order");
    // show calander in text box
    printCart();
    $("#txtOrderDate").datepicker({
     dateFormat = "dd-mm-yy";
    });

    $("#txtDueDate").datepicker({
     dateFormat = "dd-mm-yy";
    });

    //Save to database  
    $("#btnProcessOrder").on("click",function(){

      let customer_id=$("#cmbCustomer").val();
      let order_date=$("#txtOrderDate").val();
      let order_due=$("#txtDueDate").val();
      let disount=0;
      let vat = 0;
      let shipping_address = $("#txtShippingAddress").val();
      let remark = $("#txtRemark").val();
      let order_total =$("#net-total").val();

      let products = cart.getCart();

      $.ajax({
        url:'api/order/save',
        type:'POST',
        data:{
          "customer_id": customer_id,
          "order_date": order_date,
          "order_due": order_due,
          "discount": discount,
          "vat": vat,
          "shipping_address": shipping_address,
          "remark": remark,
          "order_total": order_total,
          "products": products,
        }
        success: function(res){
          console.log(res),
          cart.clearCart();
          $("#item").html("");

        }
      });
    });//

    //save other information customer
    $("#cmbCustomer").on("change",function(){

      $.ajax({
        url:'api/product/find',
        type:'GET',
        data:{
          "id": $(this).val()
        },
        success: function(res){
          let data = JSON.parse(val);
          let product = data.product;

          $("#txtPrice").val(product.offer_price);
          $("#txtQty").val(1);
        }

      });
    });

    // add items to bill temporary

     $("#btnAddToCart").on("click", function(){
      let item_id = ("#cmdProduct").val();
      let name = ("#cmdProduct").text();

      let price = ("#txtPrice").val();
      let qty = ("#Qty").val();
      let discount = ("#txtDiscount").val();

      let total_discount = discount * qty;
      let subtotal = price * qty - total_discount;

      let item ={
        "name": name,
        "item_id": item_id,
        "price": price,
        "qty": parceFloat(qty),
        "discount": discount,
        "total_discount": total_discount,
        "subtotal": subtotal,
        };

        cart.save(item);
        printCart();

     }); 

     $("body").on("click",".delete",function(){
      let id =$(this).data("id");
      cart.delItem(id);
      printCart();
     });

     $("#clearAll").on("click",function(){
      cart.clearCart(id);
      printCart();
     });


// Cart Functions................//

     function printCart(){

      let Order = cart.getCart();
      let sn =1;
      let $bill = "";
      let sub_total = 0;

      if (order != null){

        orders.foreach(function(item,i){

          subtotal += item.price * item.qty - item.discount;


          let html= 
            `<tr>
              <td>${sn}</td>
              <td>${item.name}</td>
              <td data-field='price'>${item.price}</td>
              <td data-field='qty'>${item.qty}</td>
              <td data-field='dicount'>${item.total_discount}</td>
              <td data-field='subtotal'>${item.subtotal}</td>
              <td><input type='button' class='delete' data-id='${item.item_id}' value='-'/></td>
            </tr>`

              $bill += $html;
              $n++;


        });

      }
      $("#items").html($bill);

      $("#subtotal").html(subtotal);
      let tax = (subtotal * 0.05).toFixed(2);

      $("#tax").html(tax);
      
      $("#net-total").html (parseFloat(subtotal) + parseFloat(tax));

     }


  });
</script>
<script src="js/cart.js"></script>