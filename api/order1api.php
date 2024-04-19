<?php

class OrderApi1{
  
  static function save($data){

    $order_date=$data["order_date"];
    $due_date=$data["delivery_date"];
    $order_date=$data("Y-m-d",strtotime($order_date));
    $due_date=$data("Y-m-d",strtotime($due_date));

    $products=$data["products"];

    $order->cusstomer_id=$data["cutomer_id"];
    $order->order_date=$order_date;
    $order->delivery_date=$due_date;
    $order->shipping_address=$data["shipping_address"];
    $order->order_total=$data["order_total"];
    $order->remark=$data["remark"];
    $order->status_id=1;
    $order->discount=$data["discount"];
    $order->vat=$data["vat"];

    $order_id=$order->save();

    $now =date("Y-m-d H:i:s");

    foreach($products as $product){
      $orderdetails = new OrderDetail();

      $orderdetails->order_id=$order_id;
      $orderdetails->product_id=$product["item_id"];
      $orderdetails->qty=$product["qty"];
      $orderdetails->price=$product["price"];
      $orderdetails->vat=0;
      $orderdetails->discount=$product["discount"];
      $orderdetails->save();

      $stock=new Stock();
      $stock->product_id=$product["item_id"];
      $stock->qty=$product["qty"];
      $stock->transaction_type_id=1;
      $stock->remark="order";
      $stock->save();
       
    }
    echo json_encode(["status" => "success"]);


  }//end function
}//end class


?>