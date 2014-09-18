<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 29.08.14
 * Time: 16:05
 */
class View
    implements Iterator
{

    protected $data = array();

    public function display($template) {

        foreach($this as $key => $val) {
            $$key = $val;
        }
        include  __DIR__ . '/../view/' . $template;
    }

    public function __set($key, $val) {
        $this->data[$key] = $val;
    }

    public function __get($key) {
        return ($this->data[$key]);

    }

    public function current() {
        return current($this->data);
    }

    public function key() {
        return key($this->data);
    }

    public function rewind() {
        reset($this->data);
    }

    public function next() {
        next($this->data);
    }

    public function valid() {
        return false !== current($this->data);
    }

}