<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_getContactHistory extends portal_action {

	function execute() {
		global $db,$CFG,$USER;

		$historyT = ptl_db::getTable("ptl_contact_history");
		$rA = $historyT->getRecord(array('user_id'=>$USER->id));

		$out = array();
		$out['Rows'] = $rA;
		$out['TotalRows'] = $historyT->numrows;
		$this->response = $out;
	}

}
?>
