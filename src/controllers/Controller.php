<?php
namespace CS160\controllers;

abstract class Controller {
    abstract public function invoke($info = []);
}
