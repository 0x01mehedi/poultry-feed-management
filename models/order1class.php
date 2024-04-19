<?php
class Orders implements JsonSerializable{
  public $id;
  public $customer_id;
  public $order_date;
  public $delivery_date;
  public $shipping_address;
  public $order_total;
  public $paid_amount;
  public $remark;
  public $status_id;
  public $discount;
  public $vat;
  public $created_at;
  public $updated_at;

  public function __construct(){
  }

  public function set($id,$customer_id,$order_date,$delivery_date,$shipping_address,$order_total,$paid_amount,$remark,$status_id,$discount,$vat,$created_at,$updated_at){
  $this->id=$id;
  $this->customer_id=$customer_id;
  $this->order_date=$order_date;
  $this->delivery_date=$delivery_date;
  $this->shipping_address=$shipping_address;
  $this->order_total=$order_total;
  $this->paid_amount=$paid_amount;
  $this->remark=$remark;
  $this->status_id=$status_id;
  $this->discount=$discount;
  $this->vat=$vat;
  $this->created_at=$created_at;
  $this->updated_at=$updated_at;

  }

  public function save(){
    global $db,$tx;
    $db->query("insert into ${tx}orders(customer_id,order_date,delivery_date,shipping_address,order_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at)values('$this->created_at','$this->order_date','$this->delivery_date','$this->shipping_address','$this->order_total','$this->paid_amount','$this->remark','$this->status_id','$this->discount','$this->vat','$this->created_at','$this->updated_at')");
    return $db->insert_id;

  }
  public function update(){
    global $db,$tx;
    $db->query("update ${tx}orders set customer_id='$this->customer_id',order_date='$this->order_date',delivery_date='$this->delivery_date',shipping_address='$this->shipping_address',order_total='$this->order_total',paid_amount='$this->paid_amount',remark='$this->remark',status_id='$this->status_id',discount='$this->discount',vat='$this->vat',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");

  }
  public static function delete($id){
    global $db,$tx;
    $db->query("delete from ${tx}order where id=${tx}");

  }
  public function jsonserializable(){
    return get_object_vars($this);

  }
  public static function all(){
    global $db,$tx;
    $results=$db->query("select customer_id,order_date,delivery_date,shipping_address,order_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at from ${tx}orders");
    $data=[];
    while($order=$result->fetch_object()){
      $data[]=$order;
    }
    return $data;
  }
  public static function find($id){
    global $db,$tx;
    $results=$db->query("select customer_id,order_date,delivery_date,shipping_address,order_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at from ${tx}orders where id='$id'");
    $order=$result->fetch_object();
    return $order;

  }
  static function get_last_id(){
    global $db,$tx;
    $results=$db->query("select max(id) last_id from ${tx}orders");
    $order=$result->fetch_object();
    return $order->last_id;

  }
  public function json(){
    return json_encode($this);

  }
    
  public function _toString(){
    return "
    Id:$this->id<br>
    Customer Id:$rhis->customer_id<br>
    Order Date:$$this->order_date<br>
    Delivery Date:$this->delivery_date<br>
    Shipping Address:$this->shipping_address<br>
    Order Total:$this->order_total<br>
    Paid Amount:$this->paid_amount<br>
    Remark:$this->remark<br>
    Discount:$this->discount<br>
    Vat:$this->vat<br>
    Created At:$this->created_at<br>
    Updated At:$this->updated_at<br>
    ";

  }
//---------------HTML----------------//

  static function html_select($name="cmdOrder"){
    global $db,$tx;
    $html="<select id='$id' name='$name'>";
    $result =$db->query("select id,name from ${tx}orders");
    while($result=$order->fetch_object()){
      $html+="<option value='$order->id'>$order->name</option>";
    }
    $html.="</select>";
    return $html;
  }

  static function html_table($page=1,$perpage=10,$criteria=true){
    global $db,$tx;
    $count_result=$db->query("select count(*) total from ${tr}orders");
    list($total_rows)=$count_result->fetch_row();
    $total_pages = ceil($total_rows / $perpage);
    $top = ($page-1)*$perpagel;

    $result=$db->query("select o.id,c.name customer,o.order_date,o.delivery_date,o.shipping_address,o.order_total,o.paid_amount,o.remark,s.name status from core_orders o,core_status s,core_customers c where s.id=o.status_id and c.id=o.customer_id order by o.id desc limit $top,$perpage");

    $html = "<table class='table'>";
    $html.= "<tr><th colspan='3'><a class=\"btn btn-warning\" href=\"create-order\"><a/>New Order</th></tr>"

    if($action){
      $html.="<tr><th>ID</th><th>Customer</th><th>Order Date</th><th>Delivery Date</th><th>hipping Address</th><th>Order Total</th><th>Paid Amount</th><th>Remark</th><th>Status</th><th>Action</th></tr>"

    }else{
      $html.="<tr><th>ID</th><th>Customer</th><th>Order Date</th><th>Delivery Date</th><th>hipping Address</th><th>Order Total</th><th>Paid Amount</th><th>Remark</th><th>Status</th></tr>"
    }
    while($order=$result->fetch_object()){
      $action_buttons="";
      if($action){
        $action_buttons="<td><div class='clearfix' style='display:flex;'></div></td>";
        $action_buttons.=action_button(["id"=>$order->id, "name"=>"Details","value"=>"Details","class"=>"info","url"=>"details-order",]);
        $action_buttons.=action_button(["id"=>$order->id, "name"=>"Edit","value"=>"EDit","class"=>"primary","url"=>"edit-order",]);
        $action_buttons.=action_button(["id"=>$order->id, "name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"orders",]);
        $action_buttons.="</div></td>";
      }
      $odate=date("d-m-Y" strtotime($order->order_date));
      $ddate=date("d-m-Y" strtotime($order->delivery_date));
    }
    $html.="<tr><td>$order->id</td><td>$order->customer</td><td>$odate</td><td>$ddate</td><td>$order->shipping_address</td><td>$order->order_total</td><td>$order->paid_amount</td><td>$order->ramark</td><td>$order->staus</td><td>$order->action_buttons</td></tr>"

  }
  $html.="</table>";
  $html.=pagination($page,$total_page);
  return $html;

  static function html_row_tables($id){
    $results=$db->query("select id,customer_id,order_date,delivery_date,shipping_address,order_total,paid_amount,remark,status_id,discount,vat,created_at,updated_at from ${tx}orders where id='$id'");
    $order=$result->fetch_object();
  }
  $html="<table class='table'>";
  $html.="<tr><th colspan=\"2\"></th>Order Details</tr>";
  $html.="<tr><th>Customer ID</th><td></td>$order->customer_id</tr>";
  $html.="<tr><th>Order Date</th><td></td>$order->order_date</tr>";
  $html.="<tr><th>Delivery Date</th><td></td>$order->delivery_date</tr>";
  $html.="<tr><th>Shipping Address</th><td></td>$order->shipping_address</tr>";
  $html.="<tr><th>Order Tota</th><td></td>$order->order_total</tr>";
  $html.="<tr><th>Paid Amount</th><td></td>$order->paid_amount</tr>";
  $html.="<tr><th>Remark</th><td></td>$order->remark</tr>";
  $html.="<tr><th>Status ID</th><td></td>$order->status_id</tr>";
  $html.="<tr><th>Discount</th><td></td>$order->discount</tr>";
  $html.="<tr><th>Vat</th><td></td>$order->vat</tr>";
  $html.="<tr><th>Created At</th><td></td>$order->created_at</tr>";
  $html.="<tr><th>Updated At</th><td></td>$order->updated_at</tr>";

  $html.="</table>";
  return $html;
}
?>