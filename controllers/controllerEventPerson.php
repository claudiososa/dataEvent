<?php

class ControllerEventPerson{

	public function searchEventPersonIdController($event_id,$person_id){
		$result = EventPerson::searchEventPersonIdModel($event_id,$person_id);
		return $result;
	}

	public function saveConfirmController($id){
		$update = EventPerson::saveConfirmModel($id);
		return $update;
	}

}

?>
