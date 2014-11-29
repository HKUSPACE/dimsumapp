<?php
class OrdersController extends AppController{
    public $uses = array('Order', 'Dimsum', 'Type', 'DimsumsOrder');
    
    public function create(){
        $dimsums = $this->Dimsum->find('all', array(
            'contain' => array('Type')
        ));
        $this->set('dimsums', $dimsums);
        
        if ($this->request->is('post')){
            $total = 0;
            foreach ($this->request->data['Order']['amount'] as $key => $amount){
                //debug($this->getDimsumPrice($key) * $amount);
                $total += $this->getDimsumPrice($key) * $amount;
            }
            
            $orderData['Order'] = array(
                'table_id' => $this->request->data['Order']['table_id'],
                'pic' => $this->request->data['Order']['pic'],
                'price' => $total
            );
            
            if ($this->Order->save($orderData)){
                // save dimsums data to order
                $orderId = $this->Order->id;
                foreach ($this->request->data['Order']['amount'] as $key => $amount){
                    if (!empty($amount)){
                        $data = array(
                            'order_id' => $orderId,
                            'dimsum_id' => $key,
                            'quantity' => $amount
                        );
                        
                        $this->DimsumsOrder->create();
                        $this->DimsumsOrder->save($data);
                    }
                }
                $this->Session->setFlash('Order has been saved.');
                return $this->redirect('/dimsums');
            }
        }
        
    }
    
    private function getDimsumPrice($id){
        $dimsum = $this->Dimsum->findById($id);
        //debug($dimsum);
        return $dimsum['Type']['price'];
    }
}
?>