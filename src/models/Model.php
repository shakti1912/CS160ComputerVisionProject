<?php

namespace CS160\models;
require_once("./src/configs/config.php");

abstract class Model {
    abstract public function doQuery($data = []);
}
