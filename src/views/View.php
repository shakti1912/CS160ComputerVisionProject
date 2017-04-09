<?php

namespace CS160\views;

abstract class View {
    abstract public function render($data = []);
}
