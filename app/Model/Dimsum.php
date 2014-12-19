<?php
class Dimsum extends AppModel{
    public $actsAs = array(
		'Containable',
		'Upload.Upload' => array(
			'photo' => array(
				'thumbnailMethod' => 'php',
                'thumbnailSizes' => array(
                    'xvga' => '1024x768',
                    'vga' => '640x480',
                    'thumb' => '80x80'
                )
            )
		)
	);
    public $belongsTo = array('Type');
    public $hasAndBelongsToMany = array('Order');
    public $validate = array(
        'name' => array('rule' => 'notEmpty'),
        'stock' => array('rule' => 'notEmpty'),
        'type_id' => array('rule' => 'notEmpty')
    );
}
?>