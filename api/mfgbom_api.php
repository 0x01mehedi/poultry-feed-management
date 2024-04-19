<?php
class MfgBomApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["mfg_boms"=>MfgBom::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["mfg_boms"=>MfgBom::pagination($page,$perpage),"total_records"=>MfgBom::count()]);
	}
	function find($data){
		echo json_encode(["mfgbom"=>MfgBom::find($data["id"])]);
	}
	function delete($data){
		MfgBom::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){


		// let _data={
		// 	"code": code,
		// 	"bom_name": bom_name,
		// 	"mfg_product_id": mfg_product_id,
		// 	"qty": qty,
		// 	"labor_cost": labor_cost,
		// 	"remark": remark,
		// 	"date": date,
		// 	"raw_items": raw_items
		// }
		$mfgbom_date=$data["bom_date"];

		$mfgbom_date=date("Y-m-d",strtotime($mfgbom_date));//convert date into mysql format

		$mfgbom=new MfgBom();
		$mfgbom->code=$data["code"];
		$mfgbom->name=$data["bom_name"];
		$mfgbom->product_id=$data["mfg_product_id"];
		$mfgbom->qty=$data["qty"];
		$mfgbom->labor_cost=$data["labor_cost"];
		$mfgbom->date=$mfgbom_date;
		$mfgbom->remark=$data["remark"];
		$bom_id=$mfgbom->save();

		$bom_details=$data["raw_items"];


		// let item = {   //from ajax create_bom.php line no -> 285
		// 
		// 	"product_id": product_id,
		// 	"uom_id": uom_id,
		// 	"uom_name": uom_name,
		// 	"cost": cost,
		// 	"qty": parseFloat(qty)
		// };
		$now=date("Y-m-d H:i:s"); 

			foreach($bom_details as $item){
				$details=new MfgBomDetail();
				$details->product_id=$item["product_id"];
				$details->bom_id=$bom_id;
				$details->uom_id=$item["uom_id"];
				$details->qty=$item["qty"];
				$details->cost=$item["cost"];
				$details->date=$now;
				$details->save();
			}



		echo json_encode(["success" => "yes","id"=>$bom_id]);
	}
	function update($data,$file=[]){
		$mfgbom=new MfgBom();
		$mfgbom->id=$data["id"];
		$mfgbom->code=$data["code"];
		$mfgbom->name=$data["name"];
		$mfgbom->product_id=$data["product_id"];
		$mfgbom->qty=$data["qty"];
		$mfgbom->labor_cost=$data["labor_cost"];
		$mfgbom->date=$data["date"];
		$mfgbom->remark=$data["remark"];

		$mfgbom->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
