<?php

class ControllerEventPerson{

	public function searchEventPersonIdController($event_id,$person_id){
		$result = EventPerson::searchEventPersonIdModel($event_id,$person_id);
		return $result;
	}

	public function saveConfirmController($id,$visitorId,$detalleVisitorId,$dateConfirmation){
		$update = EventPerson::saveConfirmModel($id,$visitorId,$detalleVisitorId,$dateConfirmation);
		return $update;
	}

	public function createEventPersonController($personId,$eventId,$visitorId,$detalleVisitorId,$confirmation,$dateConfirmation){
		$create = EventPerson::createEventPersonModel('event_persons',$personId,$eventId,$visitorId,$detalleVisitorId,$confirmation,$dateConfirmation);
		return $create;
	}

}

?>
