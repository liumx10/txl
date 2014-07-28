<?php echo $this->Html->script("jquery-2.1.1.min"); ?>
<?php echo $this->Html->script("touchwipe"); ?>

<script>
      $(document).ready(function(){
        var tab=1;
        var companyid = <?php echo $department['id']; ?>;
        checkout = function checkout(j){
  	      tab = j;
	  var tabnum = '#tab'+j+companyid;
	  var myApp = new Framework7();
	  myApp.showTab(tabnum);
        }

  	  $("#body").touchwipe({
      		wipeRight:function(){
      			tab = tab - 1;
      			if (tab < 1){
      				tab = 1;	
      			}	
      			checkout(tab);
      		},
      		wipeLeft:function(){
      			tab = tab + 1;
      			if (tab > 2){
      				tab = 2;
      			}
      			checkout(tab);
      		},
      				
      		min_mov_x:5,
      		preventDefaultEvent:false
          });
      });

</script>

<?php echo $this->Html->css('framework7.min');
      echo $this->Html->css('mycss');
 ?>

<body id="body">
  <div class="statusbar-overlay"></div>
  <div class="panel-overplay"></div>
  <div class="views">
    <div class="view view-main" id="view-main navbar-through">

      <div class="navbar">
        <div class="navbar-inner" style="-webkit-box-pack:justify">
            <a href=<?php echo '#'.'tab1'.$department['id']; ?> class="tab-link active" style="margin-right:70px;">
	        部门联系人
            </a>
            <a href=<?php echo '#'.'tab2'.$department['id']; ?> class="tab-link">
	        下属部门
            </a>
        </div>
      </div>
      
      <div class="pages navbar-through">
        <div data-page="index" class="page toolbar-fixed">
          <div class="page-content">
            <div class="tabs-animated-wrap">
              <div class="tabs">
                <div id=<?php echo 'tab1'.$department['id']; ?> class='tab active'>
                  <div class="list-block media-list contacts-list searchbar-found">
                    <ul>

                    <?php foreach ($people as $person): ?>
                      <li class="contact-item">
                        <a href=<?php echo $this->Html->url(array('controller'=>'txl', 'action'=>'show_people', 
                                            $person['id']));?>
                            class="item-link"
                        >
                          <div class="item-content">
                            <div class="item-media">
                              <img class="media-object pull-left" src=<?php
                                      if (file_exists(WWW_ROOT.'headimage'.DS.$person['id']))
                                          echo $this->webroot.'headimage/'.$person['id'];
                                      else
                                          echo $this->webroot.'headimage/default.png';
                                      ?>
                                  width=40px height=40px/ >
                            </div>
                            <div class="item-inner">
                              <div class="item-title-row">
                                <?php echo $person['name']; ?>
                              </div>
                              <div class='item-subtitle'>
                                    <?php
                                      $show = $person['position'];
                                      echo $show;
                                      ?>
                              </div>
                            </div>
                          </div>
                        </a>
                      </li>
                      <?php endforeach; ?>
                    </ul>
                  </div> 
                </div>

                <div id= <?php echo 'tab2'.$department['id']; ?> class='tab'>
                  <div class="list-block media-list contacts-list searchbar-found">
                    <ul>
                      <?php foreach ($groups as $group): ?>
                        <li class="contact-item">
                          <a href=<?php echo $this->Html->url(
                              array('controller' => 'txl', 'action' => 'show_group', $group['id']));?>
                              class="item-link"
                          >
                            <div class="item-content">
                              <div class="item-inner">
                                <div class="item-title-row">
                                  <?php echo $group['name']; ?>
                                </div>
                              </div>
                            </div>
                          </a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </div>                
                </div>
              </div>
            </div>
          </div>

          <div class="toolbar tabbar tabbar-labels">
            <div class="toolbar-inner">
              <a class="item-link back" >
                  <span class="icon icon-left" style="color:#A0A0A0"></span>
		  <span class="tabbar-label">Back</span>
              </a>

              <!-- Search people by name -->
              <a class="item-link" href=<?php echo $this->Html->url(
                      array( "controller" => "txl",
                             "action" => "search_people_by_name", 
                             ));
                      ?>
              >
                  <span class="icon icon-search"></span>
 		  <span class="tabbar-label">Search</span>
             </a>
          
              <a class="item-link" href=<?php echo $this->Html->url(
                      array( "controller" => "home",
                              "action" => "home"));   
                              ?>
              >
                  <span class="icon icon-home"></span>
 		  <span class="tabbar-label">Home</span>
             </a>
        
              <a class="item-link" href=<?php 
                echo $this->Html->url(array('action'=>'show_people', $myid));?>
              >
 	         <span class="icon icon-person"></span>	 
		 <span class="tabbar-label">Myself</span>

              </a>

              <a class="item-link" href=<?php echo $this->Html->url(
                        array( "controller" => "txl",
                               "action" => "show_group"));
                        ?>
                >
                 <span class="icon icon-pages"></span>
 	         <span class="tabbar-label">Company</span>
             </a>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </div>

  <?php 
        echo $this->Html->script('ajaxfileupload');
        echo $this->Html->script('framework7.min'); 
        echo $this->Html->script('my-app');
  ?>
</body>
