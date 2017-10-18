<?php

header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS");
global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_getUserInfoo extends portal_action {

	function execute() {
		global $db,$CFG,$USER;
		// $userInfo = ptl_db::getTable("tbl_user",$CFG->dbname_sms);
		// $rA = $userInfo->getRecord("id=".$db->qstr($USER->id));
		// $rA = $departmentT->getRecord("parent_id IS NOT NULL AND teaching='Y' AND enabled='Y'");


		$rA = $db->GetAll("SELECT * FROM {$CFG->dbname_sms}.tbl_user WHERE id=".$db->qstr($USER->id));
		$out = array();
		$out['Rows'] = $rA;
		// $out['TotalRows'] = $departmentT->numrows;
		$this->response = $out;
	}


}
?>
