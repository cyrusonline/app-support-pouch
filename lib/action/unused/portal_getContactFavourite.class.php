<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_getContactFavourite extends portal_action {

	function execute() {
		global $db,$CFG,$USER;

		$favouriteT = ptl_db::getTable("ptl_contact_favourite");
		$rA = $favouriteT->getRecord(array('user_id'=>$USER->id,'favorites'=>'Y'));

		$out = array();
		$out['Rows'] = $rA;
		$out['TotalRows'] = $favouriteT->numrows;
		$this->response = $out;
	}

}
?>
