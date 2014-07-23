<?php if (count($People)!=0) { ?>
    <ul class="table-view">
    <table style="margin:20px;" width="95%" >
            <tr>
                <td>负责人</td>
                <td>职务</td>
            </tr>
        <?php foreach ($People as $person): ?>
            <tr>
                 <td>
                     <?php echo $this->Html->link($person['Person']['name'], 
                     array('controller'=>'People', 'action'=>'show', $person['Person']['id'])); ?> 
                 </td>
                 
                 <td>
                     <?php echo $person['Person']['position']; ?>
                 </td>
            </tr>
        <?php endforeach; ?>
    </table>
</ul>
<?php }?>

<?php if (count($Groups)!=0) { ?>

<ul class="table-view">
    <li class="table-view-cell"> 
        <span class="icon icon-star" ></span>
        <?php
              if ($id==11111){
                  echo "公司名称";
              }else{
                  echo "下属部门";
              }
              ?>
    </li>
    
    <?php foreach ($Groups as $group): ?>
    <li class="table-view-divider">
         <span class="media-object icon icon-person pull-left"></span>
         <span class="media-object icon icon-right pull-right"></span>
         <div class="media-body">
           <?php echo $this->Html->link($group['Group']['name'], 
                array('controller' => 'Groups', 'action' => 'show', $group['Group']['id']));?> 
         </div>
    </li>
    <?php endforeach; ?>
</ul>

<?php } ?>
