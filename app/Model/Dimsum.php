<?php
class Dimsum extends AppModel{
    public $actsAs = array('Containable');
    public $belongsTo = array('Type');
    public $hasAndBelongsToMany = array('Order');
    public $validate = array(
        'name' => array('rule' => 'notEmpty'),
        'stock' => array('rule' => 'notEmpty'),
        'type_id' => array('rule' => 'notEmpty')
    );
}
?>