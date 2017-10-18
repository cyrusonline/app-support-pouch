<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_getDepartment2 extends portal_action {
	
	function execute() {
		global $db,$CFG;
		$departmentT = ptl_db::getTable("hrm_department",$CFG->dbname_hrm);
		$rA = $departmentT->getRecord(array('enabled'=>'Y'));

		$out = array();
		$out['Rows'] = $rA;
		$out['TotalRows'] = $departmentT->numrows;
		$this->response = $out;
	}

}
?>