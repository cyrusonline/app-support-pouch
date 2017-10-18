<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_setContactFavourite extends portal_action {

	function execute() {
		global $db,$CFG,$USER;


		$category = $_REQUEST['category'];
		$contact_id = $_REQUEST['contact_id'];

		$favouriteT = ptl_db::getTable("ptl_contact_favourite");
		$row = $favouriteT->getRow(array('user_id'=>$USER->id,'category'=>$category,'contact_id'=>$contact_id));
		if ($row['id']==null) {
			$rA = $favouriteT->insertRecord(array('user_id'=>$USER->id,'category'=>$category,'contact_id'=>$contact_id,'favorites'=>'Y'));
			$id = $rA['data'];
		}
		else {
			$id = $row['id'];
			$favouriteT->updateRecord(array('id'=>$id,'favorites'=>$_REQUEST['favorites']));
		}

		$valid = false;
		$out = array();
		if ($id>0) {
			$valid = true;
			$out['data'] = $id;
			$msg = 'Insert successfully!';
		}
		else {
			$msg = 'Fail to add';
		}
		$out['result'] = $valid;
		$out['error'] = $msg;

		$this->response = $out;
	}

}
?>
