<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_getSupportType extends portal_action {

	function execute() {
		global $db,$CFG,$USER;
		// $userInfo = ptl_db::getTable("tbl_user",$CFG->dbname_sms);
		// $rA = $userInfo->getRecord("id=".$db->qstr($USER->id));
		// $rA = $departmentT->getRecord("parent_id IS NOT NULL AND teaching='Y' AND enabled='Y'");

		// $rA = $db->GetAll("SELECT * FROM {$CFG->dbname_support}.s_support_type ");
		
		$rA = $db->GetAll("SELECT * FROM {$CFG->dbname_support}.s_support_type WHERE enabled='Y'");
		$out = array();
		$out['Rows'] = $rA;
		// $out['TotalRows'] = $departmentT->numrows;
		$this->response = $out;
	}


}
?>
