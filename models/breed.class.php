<?php
class Breed implements JsonSerializable{
	public $id;
	public $name;

	public function __construct(){
	}
	public function set($id,$name){
		$this->id=$id;
		$this->name=$name;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}breeds(name)values('$this->name')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}breeds set name='$this->name' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}breeds where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}breeds");
		$data=[];
		while($breed=$result->fetch_object()){
			$data[]=$breed;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name from {$tx}breeds $criteria limit $top,$perpage");
		$data=[];
		while($breed=$result->fetch_object()){
			$data[]=$breed;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}breeds $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name from {$tx}breeds where id='$id'");
		$breed=$result->fetch_object();
			return $breed;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}breeds");
		$breed =$result->fetch_object();
		return $breed->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbBreed"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}breeds");
		while($breed=$result->fetch_object()){
			$html.="<option value ='$breed->id'>$breed->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}breeds $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name from {$tx}breeds $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-warning\" href=\"create-breed\">New Breed</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th></tr>";
		}
		while($breed=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$breed->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-breed"]);
				$action_buttons.= action_button(["id"=>$breed->id, "name"=>"Edit", "value"=>"Edit", "class"=>"secondary", "url"=>"edit-breed"]);
				$action_buttons.= action_button(["id"=>$breed->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"breeds"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$breed->id</td><td>$breed->name</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name from {$tx}breeds where id={$id}");
		$breed=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Breed Details</th></tr>";
		$html.="<tr><th>Id</th><td>$breed->id</td></tr>";
		$html.="<tr><th>Name</th><td>$breed->name</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
