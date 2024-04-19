<?php
class MfgProductionApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["mfg_productions"=>MfgProduction::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["mfg_productions"=>MfgProduction::pagination($page,$perpage),"total_records"=>MfgProduction::count()]);
	}
	function find($data){
		echo json_encode(["mfgproduction"=>MfgProduction::find($data["id"])]);
	}
	function delete($data){
		MfgProduction::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){

		$mfgproduction=new MfgProduction();

		$b=$data["bomInfo"];

		$mfgproduction->production_datetime=$b["production_datetime"];
		$mfgproduction->bom_id=$b["bom_id"];
		$mfgproduction->product_id=$b["product_id"];
		$mfgproduction->bqty=$b["bqty"];
		$mfgproduction->labor_cost=$b["labor_cost"];
		$mfgproduction->total_cost=$b["tcost"];		


		$bom_id=$mfgproduction->save();

		$production_details= new MfgBomDetail();
		$i=$data["itemInfo"];

		//$mfg_details->qty=$i["qty"];
		//$mfg_details->labor_cost=$i["labor_cost"];
		//$mfg_details->u_cost=$i["u_cost"];
		//$mfg_details->u_qty=$i["u_qty"];
		//$mfg_details->linetotal=$i["linetotal"];

		//$mfg_details->bom_id=$bom_id;

		//$mfg_details->save();

		//$ps=$data["productionInfo"];

		// foreach($ps as $p){
		// 	$pp=new MfgProductionDetail();
		// 	$pp->bom_id=$bom_id;
		// 	$pp->production_id=$p["production_id"];
		// 	$pp->product_id=$p["product_id"];
		// 	$pp->qty=$p["qty"];
		// 	$pp->uom_id=$p["uom_id"];
		// 	$pp->cost=$p["cost"];
		// }
		

		echo json_encode(["success" => $data["bomInfo"]]);
	}



	function update($data,$file=[]){
		$mfgproduction=new MfgProduction();
		$mfgproduction->id=$data["id"];
		$mfgproduction->production_datetime=$data["production_datetime"];
		$mfgproduction->bom_id=$data["bom_id"];
		$mfgproduction->qty=$data["qty"];
		$mfgproduction->labor_cost=$data["labor_cost"];
		$mfgproduction->manager_id=$data["manager_id"];
		$mfgproduction->total_cost=$data["total_cost"];
		$mfgproduction->product_id=$data["product_id"];
		$mfgproduction->uom_id=$data["uom_id"];

		$mfgproduction->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
