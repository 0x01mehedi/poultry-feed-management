<?php
class MfgBom implements JsonSerializable{
	public $id;
	public $code;
	public $name;
	public $product_id;
	public $qty;
	public $labor_cost;
	public $date;
	public $remark;

	public function __construct(){
	}
	public function set($id,$code,$name,$product_id,$qty,$labor_cost,$date,$remark){
		$this->id=$id;
		$this->code=$code;
		$this->name=$name;
		$this->product_id=$product_id;
		$this->qty=$qty;
		$this->labor_cost=$labor_cost;
		$this->date=$date;
		$this->remark=$remark;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}mfg_boms(code,name,product_id,qty,labor_cost,date,remark)values('$this->code','$this->name','$this->product_id','$this->qty','$this->labor_cost','$this->date','$this->remark')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}mfg_boms set code='$this->code',name='$this->name',product_id='$this->product_id',qty='$this->qty',labor_cost='$this->labor_cost',date='$this->date',remark='$this->remark' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}mfg_boms where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,code,name,product_id,qty,labor_cost,date,remark from {$tx}mfg_boms");
		$data=[];
		while($mfgbom=$result->fetch_object()){
			$data[]=$mfgbom;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,code,name,product_id,qty,labor_cost,date,remark from {$tx}mfg_boms $criteria limit $top,$perpage");
		$data=[];
		while($mfgbom=$result->fetch_object()){
			$data[]=$mfgbom;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}mfg_boms $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,code,name,product_id,qty,labor_cost,date,remark from {$tx}mfg_boms where id='$id'");
		$mfgbom=$result->fetch_object();
			return $mfgbom;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}mfg_boms");
		$mfgbom =$result->fetch_object();
		return $mfgbom->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Code:$this->code<br> 
		Name:$this->name<br> 
		Product Id:$this->product_id<br> 
		Qty:$this->qty<br> 
		Labor Cost:$this->labor_cost<br> 
		Date:$this->date<br> 
		Remark:$this->remark<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbMfgBom"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}mfg_boms");
		while($mfgbom=$result->fetch_object()){
			$html.="<option value ='$mfgbom->id'>$mfgbom->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}mfg_boms $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,code,name,product_id,qty,labor_cost,date,remark from {$tx}mfg_boms $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-warning\" href=\"create-bom\">New MfgBom</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Code</th><th>Name</th><th>Product Id</th><th>Qty</th><th>Labor Cost</th><th>Date</th><th>Remark</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Code</th><th>Name</th><th>Product Id</th><th>Qty</th><th>Labor Cost</th><th>Date</th><th>Remark</th></tr>";
		}
		while($mfgbom=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$mfgbom->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-bom"]);
				$action_buttons.= action_button(["id"=>$mfgbom->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-mfgbom"]);
				$action_buttons.= action_button(["id"=>$mfgbom->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"mfg_boms"]);
				$action_buttons.= action_button(["id"=>$mfgbom->id, "name"=>"Production", "value"=>"Production", "class"=>"success", "url"=>"create-production"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$mfgbom->id</td><td>$mfgbom->code</td><td>$mfgbom->name</td><td>$mfgbom->product_id</td><td>$mfgbom->qty</td><td>$mfgbom->labor_cost</td><td>$mfgbom->date</td><td>$mfgbom->remark</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,code,name,product_id,qty,labor_cost,date,remark from {$tx}mfg_boms where id={$id}");
		$mfgbom=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">MfgBom Details</th></tr>";
		$html.="<tr><th>Id</th><td>$mfgbom->id</td></tr>";
		$html.="<tr><th>Code</th><td>$mfgbom->code</td></tr>";
		$html.="<tr><th>Name</th><td>$mfgbom->name</td></tr>";
		$html.="<tr><th>Product Id</th><td>$mfgbom->product_id</td></tr>";
		$html.="<tr><th>Qty</th><td>$mfgbom->qty</td></tr>";
		$html.="<tr><th>Labor Cost</th><td>$mfgbom->labor_cost</td></tr>";
		$html.="<tr><th>Date</th><td>$mfgbom->date</td></tr>";
		$html.="<tr><th>Remark</th><td>$mfgbom->remark</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
