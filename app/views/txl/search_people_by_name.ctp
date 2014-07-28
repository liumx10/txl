<div class="navbar">
    <div class="navbar-inner">
    </div>
</div>

<div data-page="home" class="page no-navbar">
  <!-- Search bar -->
  <form data-search-list=".list-block-search" data-search-in=".item-title" class="searchbar">
    <div class="searchbar-input" style="width:80%; margin-right:5px;">
      <input type="search" placeholder="Search"><a href="#" class="searchbar-clear"></a>
    </div><a href="#" class="back">Cancel</a>
  </form>
 
  <!-- Search bar overlay -->
  <div class="searchbar-overlay"></div>
 
  <div class="page-content">
    <!-- This block will be displayed if nothing found -->
    <div class="content-block searchbar-not-found">
      <div class="content-block-inner">查无此人</div>
    </div>
 
    <!-- This block will be displayed if anything found, and this list block is used a searbar target -->
    <div class="list-block list-block-search searchbar-found">
        <ul>
            <?php foreach($employees as $employee): ?>
                <a href=<?php echo $this->Html->url(array('controller'=>'txl', 'action'=>'show_people', 
                                                $employee['Employee']['id']));?>
                                class="item-link">
                    <li class="item-content">
                        <div class="item-media">
                              <img  src=<?php
                                      if (file_exists(WWW_ROOT.'headimage'.DS.$employee['Employee']['id']))
                                          echo $this->webroot.'headimage/'.$employee['Employee']['id'];
                                      else
                                          echo $this->webroot.'headimage/default.png';
                                      ?>
                                  width=40px height=40px/ >
                        </div>
                        <div class="item-inner">
                          <div class="item-title">
                            <?php echo $employee['Employee']['name']; ?>
                          </div>
                          <div class='item-subtitle'>
                                <?php
                                  $show = $employee['Employee']['position'];
                                  echo $show;
                                  ?>
                          </div>
                        </div>
                        
                    </li>
                </a>    
            <?php endforeach; ?>
        </ul>
    </div>
  </div>
</div>  
