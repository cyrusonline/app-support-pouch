<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_getRequest extends portal_action {

	function execute() {
		global $db,$CFG,$USER;

$support_id = $_REQUEST['support_id'];		// $userInfo = ptl_db::getTable("tbl_user",$CFG->dbname_sms);
		// $rA = $userInfo->getRecord("id=".$db->qstr($USER->id));
		// $rA = $departmentT->getRecord("parent_id IS NOT NULL AND teaching='Y' AND enabled='Y'");

		// $rA = $db->GetAll("SELECT * FROM {$CFG->dbname_support}.s_supportid_categoryid
		// 	JOIN s_support_category ON s_supportid_categoryid.category_id = s_support_category.id
		// 	JOIN s_support_type ON s_supportid_categoryid.support_id = s_support_type.id
		// 	 WHERE support_id =".$support_id);


			 $rA = $db->GetAll("SELECT r.*,t.support_type_name,s.status FROM {$CFG->dbname_support}.s_request r
				 JOIN {$CFG->dbname_support}.s_support_type t ON r.support_id = t.id
				 JOIN {$CFG->dbname_support}.s_status s ON r.status_id = s.id
				 WHERE r.user_id=".$db->qstr($USER->id)."ORDER BY r.timecreated DESC");
			 $rA2 = $db->GetAll("SELECT * FROM {$CFG->dbname_support}.s_request_items
				 JOIN {$CFG->dbname_support}.s_support_item ON s_request_items.item_id = s_support_item.id");


		$out['Rows'] = $rA;
		$out2['Rows'] = $rA2;
		for ($i=0; $i <count($out['Rows']) ; $i++) {
			// $out['Rows'][$i]["items_array"] = array();
			$items_array = array();
			for ($j=0; $j <count($out2['Rows']) ; $j++) {
					if ($out['Rows'][$i]["id"] == $out2['Rows'][$j]["request_id"]) {
							array_push($items_array, $out2['Rows'][$j]["item_name"]);
					}

			}
			$out['Rows'][$i]["items_needed"] = implode(",",$items_array);
		}

		// $out['TotalRows'] = $departmentT->numrows;
		$this->response = $out;
	}


}
?>
