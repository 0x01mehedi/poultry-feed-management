<style>
    .order-head{
        margin-bottom:30px;
    }
    table,td{
        border:1px solid lightgray;
    }

    #cmbUom{
        width:100%;
    }
  
</style>
<!-- <div class="section">
    <div class="row">
      <div class="col-12 p-3">             
        <div class="shadow-lg" style="background-color:#fff">
          <h2>Create Production</h2>
        </div>
      </div>
  </div>
</div> -->

<h2 class="ms-4 my-3">Create Bom</h2>
<style>

.font-size{
    font-size= 80px;
    width: ;

}

</style>

<div class="section"> 
    <div class="row">
        
        <div class="col-12 mx-3 border border-3 ">

        <div class="product-col-8" style="background-color:#fff" height="300px">



        <table class="table">
        

        <small class="float-right mx-3 my-3" ><b>Date: <?php echo date("d M Y")  ?></b></small>  
            <tr><td><b> BOM Code :</td><td> <input type="text" id="code"  ></b></td></tr>
                <tr><td><b>Name :</td><td><input type="text" id="name" /></b></td></tr>
          
                 <tr><td><b>Product :</b></td><td><?php
                       echo Product::html_selectOrder("cmbProduct");
        ?></td></tr>
         <tr><td><b>Qty :</td><td><input type="text" id="Qty" /></b></td></tr>
         <tr><td><b>Labour Cost :</td><td><input type="text" id="Labour" /></b></td></tr>
        </table>
        </div>
        <tr>
                  <td>
                    <table class="table table-active text-center">
                          <tr>
                            <td>Bom</td>
                            <td>Raw Material</td>
                            <td>Qty</td>
                            <td>Cost</td>
                            <td>Uom</td>
                            <td><input type="button" value="+" id="add"></td>
                          </tr>
                          <tr>
                            <td style="width:190px;"><select class="form-control" id="bom" ></select></td>
                            <td style="width:190px;"><select class="form-control" id="material" ></select></td>
                            <td><input type="text" id="size" /></td>
                            <td><input type="text" id="size" /></td>
                            <td style="width:190px;"><select class="form-control" id="uom" ></select></td>
                            
                        </tr>  
                   </table>
                  </td>    
                </tr>
 
    </div>

    </div>

</div>