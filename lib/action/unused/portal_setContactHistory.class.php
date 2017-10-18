<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_setContactHistory extends portal_action {

	function execute() {
		global $db,$CFG,$USER;


		$category = $_REQUEST['category'];
		$contact_id = $_REQUEST['contact_id'];

		$historyT = ptl_db::getTable("ptl_contact_history");
		// $row = $historyT->getRow(array('user_id'=>$USER->id,'category'=>$category,'contact_id'=>$contact_id));
		//if ($row['id']==null) {
			$rA = $historyT->insertRecord(array('user_id'=>$USER->id,'category'=>$category,'contact_id'=>$contact_id));
			$id = $rA['data'];
		//}


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
