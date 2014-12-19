<h1>Dimsum Index</h1>
<?php echo $this->Html->link('Add Dimsum', '/dimsums/add'); ?>
<?php if (!empty($dimsums)): ?>
<table>
    <tr>
        <th>ID</th>
		<th>Photo</th>
        <th>Name</th>
        <th>Stock</th>
        <th>Type</th>
        <th>Action</th>
        <th>Created</th>
    </tr>
    <?php foreach ($dimsums as $dimsum): ?>
    <tr>
        <td><?php echo $dimsum['Dimsum']['id']; ?></td>
		<td><?php echo $this->Html->image('/files/dimsum/photo/'.$dimsum['Dimsum']['id'].'/thumb_'.$dimsum['Dimsum']['photo'], array('class' => 'dimsum-photo')); ?></td>
        <td><?php echo $dimsum['Dimsum']['name']; ?></td>
        <td><?php echo $dimsum['Dimsum']['stock']; ?></td>
        <td><?php echo $types[$dimsum['Dimsum']['type_id']]; ?></td>
        <td></td>
        <td><?php echo $dimsum['Dimsum']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
<p>No dimsum available.</p>
<?php endif; ?>