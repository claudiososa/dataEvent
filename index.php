<?php

require_once "models/enlaces.php";
require_once "models/General.php";
require_once "models/crud.php";
require_once "models/crudPerson.php";
require_once "models/CrudStudent.php";
require_once "models/Courses.php";
require_once "models/CrudAttendance.php";
require_once "models/Statis.php";

require_once "controllers/controller.php";
require_once "controllers/controllerPerson.php";
require_once "controllers/ControllerCourse.php";
require_once "controllers/ControllerStudent.php";
require_once "controllers/ControllerAttendance.php";
require_once "controllers/controllerStatis.php";


$mvc = new MvcController();
$mvc -> pagina();

?>
