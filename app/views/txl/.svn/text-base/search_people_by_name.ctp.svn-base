<br />
<?php echo $this->Form->create(null, array('action' => 'search_people_by_name')); ?>
	<input type="search" name="data[name]" placeholder='请输入姓名'/>
    <button class="btn btn-link" onclick="return dosubmit()">
    	<span class="icon icon-right pull-right"></span>
    	Search
    </button>
</form>
<hr/>

<?php if ($input == true) { ?>
<?php 
	if ($people != null){   ?>
	<ul class="table-view">
        <?php foreach($people as $person): ?>
    	<li class="table-view-cell media">
            
            <!-- head photo now is default now -->
			<img class="media-object pull-left" src=<?php 
                if (file_exists(WWW_ROOT.'headimage/'.$person['Employee']['id'])){
                    echo $this->webroot.'headimage/'.$person['Employee']['id'];
                }else{
                    echo $this->webroot.'headimage/default.png';
                }

            ?> width=40px height=40px/ >
          
			<div class="media-body font_p">
                <a href=<?php echo $this->Html->url(
                    array("controller" => 'txl', "action"=>'show_people', $person['Employee']['id']));
                    ?>
                >
                <?php echo $person['Employee']['name'] ?>

                <p class="">
				<?php
					$show = $person['Employee']['position'];
					$show = $this->Text->truncate($show, 35, array('ending'=>'...')); 
					echo $this->Html->link($show,
					array('controller'=>'txl', 'action'=>'show_people', $person['Employee']['id']));
					?>
                </p>
                </a>
			</div>
	   </li>
	<?php endforeach; ?>
	</ul> 
<?php  }
else {
    echo " 查无此人";
}
}
?>

<nav class="bar bar-tab bar-footer">
    <a class="tab-item" onclick="window.history.back()">
          <span class="icon icon-left"></span>
          <span class="tab-label">Back</span>
    </a>

    
    <!-- Search people by name -->
    <a class="tab-item" href=<?php echo $this->Html->url(
            array( "controller" => "txl",
                   "action" => "search_people_by_name",
                   $companyid));
            ?>
    >
        <span class="icon icon-search"></span>
        <span class="tab-label">Search</span>
    </a>

    <a class="tab-item" href=<?php echo $this->Html->url(
            array( "controller" => "txl",
                    "action" => "show_group",
                    $companyid));   
                    ?>
    >
        <span class="icon icon-home"></span>
        <span class="tab-label">Home</span>
    </a>
    
    <!-- Edit personal information -->
    <a class="tab-item" 
       href=<?php echo $this->Html->url(array('controller'=>'txl','action'=>'show_people', $myid)); ?>
    >
        <span class="icon icon-person"></span>
        <span class="tab-label">Myself</span>
    </a>

    <a class="tab-item" href=<?php
          echo $this->Html->url(
            array("controller"=>"txl",
                  "action"=>"show_group")); ?>
    >
        <span class="icon icon-pages"></span>
        <span class="tab-label">Txl</span>
    </a>
</nav>
