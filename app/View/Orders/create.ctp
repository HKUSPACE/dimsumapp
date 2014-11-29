<h1>Create New Order</h1>
<?php echo $this->Form->create('Order'); ?>
<?php echo $this->Form->input('table_id', array('type' => 'text')); ?>
<?php echo $this->Form->input('pic', array('label'=>'Person In Charge')); ?>
<?php if (!empty($dimsums)): ?>
<?php foreach ($dimsums as $dimsum): ?>
    <div class="dimsum">
        <h2><?php echo $dimsum['Dimsum']['name']; ?></h2>
        <p class="dimsum-type"><?php echo $dimsum['Type']['name']; ?></p>
        <img src="" />
        <?php echo $this->Form->input('Order.amount.'.$dimsum['Dimsum']['id']); ?>
    </div>
<?php endforeach; ?>
<?php endif; ?>
<div class="total-amount">$ 0.00</div>
<?php echo $this->Form->end('Create Order'); ?>