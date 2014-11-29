<?php
class OrdersController extends AppController{
    public $uses = array('Order', 'Dimsum', 'Type', 'DimsumsOrder');
    
    public function index(){
        $orders = $this->Order->find('all', array(
            'contain' => array(
                'DimsumsOrder', 
                'Dimsum'=>array(
                    'Type'
                ))
        ));
        foreach ($orders as &$order){
            $total = 0;
            foreach ($order['Dimsum'] as $dimsum){
                $total += $dimsum['Type']['price'] * $dimsum['DimsumsOrder']['quantity'];
            }
            
            $order['Order']['price'] = $total;
        }
        $this->set('orders', $orders);
    }
    
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
                //'price' => $total
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
                        
                        if ($this->checkDimsumAmount($key, $amount)){
                            $this->DimsumsOrder->create();

                            if ($this->DimsumsOrder->save($data)){
                                $this->deductDimsumAmount($key, $amount);
                            }
                        }
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
    
    private function deductDimsumAmount($dimsumId, $quantity){
        $dimsum = $this->Dimsum->findById($dimsumId);
        $dimsum['Dimsum']['stock'] -= $quantity;
        return $this->Dimsum->save($dimsum);
    }
    
    private function checkDimsumAmount($dimsumId, $quantity){
        $dimsum = $this->Dimsum->findById($dimsumId);
        return ($dimsum['Dimsum']['stock'] >= $quantity);
    }
}
?>