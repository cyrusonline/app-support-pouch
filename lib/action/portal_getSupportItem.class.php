<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_getSupportItem extends portal_action {

	function execute() {
		global $db,$CFG,$USER;
		// $userInfo = ptl_db::getTable("tbl_user",$CFG->dbname_sms);
		// $rA = $userInfo->getRecord("id=".$db->qstr($USER->id));
		// $rA = $departmentT->getRecord("parent_id IS NOT NULL AND teaching='Y' AND enabled='Y'");

		$support_id = $_REQUEST['support_id'];
		$rA = $db->GetAll("SELECT * FROM {$CFG->dbname_support}.s_support_item WHERE support_id =".$support_id);
		$out = array();
		$out['Rows'] = $rA;
		// $out['TotalRows'] = $departmentT->numrows;
		$this->response = $out;
	}


}
?>
