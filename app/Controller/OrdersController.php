<?php
class OrdersController extends AppController{
    public $uses = array('Order', 'Dimsum', 'Type');
    
    public function create(){
        $dimsums = $this->Dimsum->find('all', array(
            'contain' => array('Type')
        ));
        $this->set('dimsums', $dimsums);
    }
}
?>