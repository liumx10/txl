<h1>People </h1>
<table>
    <tr>
        <th>name</th>
        <th>position</th>
    </tr>
    <?php foreach ($People as $person): ?>
    <tr>
        <td> <?php echo $this->Html->link($person['Person']['name'], 
         array('controller'=>'People', 'action'=>'show', $person['Person']['id'])); ?> 
        </td>
        <td> <?php echo $person['Person']['position']; ?> </td>
    </tr>
    <?php endforeach; ?>
</table>

<h1>Sub Apartments</h1>
<table>
    <tr>
        <th>name</th>
    </tr>

    <?php foreach ($Groups as $group): ?>
    <tr>
    	<td> <?php echo $this->Html->link($group['Group']['name'], 
         array('controller' => 'Groups', 'action' => 'show', $group['Group']['id']));?> 
    </td>
    </tr>
    <?php endforeach; ?>

</table>
