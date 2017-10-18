<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_getDepartment extends portal_action {

	function execute() {
		global $db,$CFG;

		$rA = $db->GetAll("SELECT SQL_CALC_FOUND_ROWS d.*,(SELECT COUNT(t.id) FROM {$CFG->dbname_hrm}.hrm_department_team t WHERE d.id=t.department) teams,d2.fullname parent_fullname
		FROM {$CFG->dbname_hrm}.hrm_department d LEFT JOIN {$CFG->dbname_hrm}.hrm_department d2 ON (d2.id=d.parent_id) WHERE d.enabled='Y' ORDER BY orderid ASC,shortname ASC");
	  	$totalRows = $db->GetOne("SELECT FOUND_ROWS() AS total");
	
		$out = array();
		$out['Rows'] = $rA;
		$out['TotalRows'] = $totalRows;
		$this->response = $out;
	}

}
?>
