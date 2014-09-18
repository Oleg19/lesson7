<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 29.08.14
 * Time: 18:09
 */

interface Iterator
{

    public function current();

    public function key();

    public function next();

    public function rewind();

    public function valid();
}