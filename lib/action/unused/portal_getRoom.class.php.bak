<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_getRoom extends portal_action {

	function execute() {
		global $db,$CFG,$USER;

		$roomT = ptl_db::getTable("fms_room_contact",$CFG->dbname_fms);
		$rA = $roomT->getRecord(array('enabled'=>'Y'));

		$out = array();
		$out['Rows'] = $rA;
		$out['TotalRows'] = $roomT->numrows;
		$this->response = $out;
	}

}
?>
