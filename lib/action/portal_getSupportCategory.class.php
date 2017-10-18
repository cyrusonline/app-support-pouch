<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_getSupportCategory extends portal_action {

	function execute() {
		global $db,$CFG,$USER;

$support_id = $_REQUEST['support_id'];		// $userInfo = ptl_db::getTable("tbl_user",$CFG->dbname_sms);
		// $rA = $userInfo->getRecord("id=".$db->qstr($USER->id));
		// $rA = $departmentT->getRecord("parent_id IS NOT NULL AND teaching='Y' AND enabled='Y'");

		// $rA = $db->GetAll("SELECT * FROM {$CFG->dbname_support}.s_supportid_categoryid
		// 	JOIN s_support_category ON s_supportid_categoryid.category_id = s_support_category.id
		// 	JOIN s_support_type ON s_supportid_categoryid.support_id = s_support_type.id
		// 	 WHERE support_id =".$support_id);


			 $rA = $db->GetAll("SELECT * FROM {$CFG->dbname_support}.s_supportid_categoryid
				 JOIN {$CFG->dbname_support}.s_support_category ON s_supportid_categoryid.category_id = s_support_category.id
				 JOIN {$CFG->dbname_support}.s_support_type ON s_supportid_categoryid.support_id = s_support_type.id
 WHERE support_id =".$support_id);


		$out['Rows'] = $rA;
		// $out['TotalRows'] = $departmentT->numrows;
		$this->response = $out;
	}


}
?>
