<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_getUserProfile extends portal_action {

	function execute() {
		global $db,$CFG,$USER;
		// $userInfo = ptl_db::getTable("tbl_user",$CFG->dbname_sms);
		// $rA = $userInfo->getRecord("id=".$db->qstr($USER->id));
		// $rA = $departmentT->getRecord("parent_id IS NOT NULL AND teaching='Y' AND enabled='Y'");


		$rA = $db->GetAll("SELECT * FROM {$CFG->dbname_support}.s_profile WHERE user_id=".$db->qstr($USER->id));
		$out = array();
		$out['Rows'] = $rA;
		// $out['TotalRows'] = $departmentT->numrows;
		$this->response = $out;
	}


}
?>
