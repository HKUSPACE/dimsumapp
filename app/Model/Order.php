<?php
class Order extends AppModel{
    public $hasAndBelongsToMany = array('Dimsum');
    public $actsAs = array('Containable');
}
?>