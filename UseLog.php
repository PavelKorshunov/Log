<?php
require "Log.php";

use Log\Log;

$data = "Текст";

$object = new Log();
$object->saveInFile("", $data);