<?php
class DimsumsController extends AppController{
	
	public $components = array('RequestHandler');
    
	public $uses = array('Dimsum', 'Type');
        
    public function index(){
        $dimsums = $this->Dimsum->find('all');
        $this->set('dimsums', $dimsums);
        
        $types = $this->Type->find('list', array('field' => array(
            'Type.id', 'Type.name'
        )));
    
        $this->set('types', $types);
		$this->set('_serialize', array('dimsums', 'types'));
    }
    
    public function add(){
        $types = $this->Type->find('list', array('field' => array(
            'Type.id', 'Type.name'
        )));
        
        $this->set('types', $types);
        if ($this->request->is('post')){
            if ($this->Dimsum->save($this->request->data)){
                $this->Session->setFlash('New dimsum is added.');
                $this->redirect('/dimsums/');
            }
        }
        
    }
}
?>