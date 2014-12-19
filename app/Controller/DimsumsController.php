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
		header('Access-Control-Allow-Origin: *');  
    }
    
    public function add(){
		Configure::write('debug', 0);
        $types = $this->Type->find('list', array('field' => array(
            'Type.id', 'Type.name'
        )));
        
		$output = array('success' => false);
		
        $this->set('types', $types);
        if ($this->request->is('post')){
            if ($this->Dimsum->save($this->request->data)){
				$output = array('success' => true);
				$this->set('output', $output);
				$this->set('_serialize', array('output'));
                //$this->Session->setFlash('New dimsum is added.');
                //$this->redirect('/dimsums/');
            }
			else{
				$this->set('output', $output);
				$this->set('_serialize', array('output'));
			}
			header('Access-Control-Allow-Origin: *');  
        }
        
    }
}
?>