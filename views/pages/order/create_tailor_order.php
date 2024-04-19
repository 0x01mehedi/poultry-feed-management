<style>
    .order-head{
        margin-bottom:30px;
    }
    table,td{
        border: 1px solid #000;
    }
</style>
<div class="section">
    <div class="row">
        <div class="col-12 p-3">
            <div class="shadow-lg" style="background-color: #fff;">
                <table class="table">
                    <tr>
                        <td colspan="2">
                            <h2 class="d-flex justify-content-center">Order</h2>
                        </td>
                    </tr>
                    <tr>
                        <td>Dalivery Date</td>
                        <td><input class="form-control" type="date" id="daliveryDate"></td>
                    </tr>

                    <tr>
                        <td>Customer</td>
                        <td><input type="text" id="customer"></td>
                    </tr>

                    <tr>
                        <td>Mobile</td>
                        <td><input type="text" id="mobile"></td>
                    </tr>

                    <tr>
                        <td>Dress</td>
                        <td>
                            <?php echo TailorDresse::html_select("cmbDresses");?>
                        </td>
                    </tr>

                    <tr>
                        <td>Price</td>
                        <td><input type="text" id="price"></td>
                    </tr>

                    <tr>
                        <td>Qty</td>
                        <td><input type="text" id="qty"></td>
                    </tr>
                    <tr>
                    <td colspan="2">
                        <table class="table">
                        <tr>
                            <td>Measurement</td>
                            <td>Size</td>
                            <td>Uom</td>
                            <td><input type="button" value="+" id="add"></td>
                        </tr>             
                        <tr>
                            <td style="width:200px;"><select class="form-control" id="measurement"></select></td>
                            <td><input type="text" id="size"></td>
                            <td><select></select></td>
                            <td></td>
                        </tr>
                        </table>          
                    </td>      
                    </tr>          
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){

        $("#cmbDresses").on("change",function(){

            let _id=$("#cmbDresses").val();
            $.ajax({
                type:"POST",
                data:{id:_id},
                url:"api/TailorDressParameter/filter",
                success:function(res){
                let _data=JSON.parse(res);
                //console.log(_data);
                let html="";
                _data.parameters.forEach(function(d,i){
                //console.log(_d);
                html+=`<option value="${d.id}">${d.name}</option>`;
                           
                });
                $("#measurement").html(html);
                   }
                });
            });
        });
</script>    