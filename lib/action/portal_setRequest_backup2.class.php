<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_setRequest extends portal_action {

	function execute() {
		global $db,$CFG,$USER;


		$phone = $_REQUEST['phone'];

		$profileT = ptl_db::getTable("s_request","db_support");


$date = date('Y-m-d H:i:s');

$event_title = $_REQUEST['event_title'];
$raw_eventdate = htmlentities($_REQUEST['event_title']);
// $event_time = date('Y-m-d H:i:s',strtotime($_REQUEST['event_time']));
$event_time =  date("Y-m-d H:i:s",strtotime($raw_eventdate));
$location = $_REQUEST['location'];
$details = $_REQUEST['details'];
			$rA = $profileT->insertRecord(array('request_date'=>$date,'event_title'=>$event_title,'location'=>$location,'details'=>$details));
			$id = $rA['data'];


			// $rA = $profileT->insertRecord(array('phone'=>$phone,'user_id'=>$USER->id));


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
