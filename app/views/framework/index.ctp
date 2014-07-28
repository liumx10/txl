<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- Your app title -->
    <title>My App</title>
    <!-- Path to Framework7 Library CSS-->
    <?php echo $this->Html->css('framework7.min'); ?>
    <?php echo $this->Html->css('my-app'); ?>
    <!-- Path to your custom app styles-->
  </head>
  <body>
    <!-- Status bar overlay for full screen mode (PhoneGap) -->
    <div class="statusbar-overlay"></div>
    <!-- Panels overlay-->
    <div class="panel-overlay"></div>
    <!-- Left panel with reveal effect-->
    <div class="panel panel-left panel-reveal">
      <div class="content-block">
        <p>Left panel content goes here</p>
      </div>
    </div>
    <!-- Views -->
    <div class="views">
      <!-- Your main view, should have "view-main" class -->
      <div class="view view-main">
        <!-- Top Navbar-->
	<div class="pages">
	  <div class="page navbar-fixed">
	
           <div class="navbar">
          	  <div class="navbar-inner">
          	     <!-- Buttons row as tabs controller in navbar-->
          	        <!-- Link to 1st tab, active -->
          	        <a href="#tab1" class="tab-link active button">Tab 1</a>
          	        <!-- Link to 2nd tab -->
          	        <a href="#tab2" class="tab-link button">Tab 2</a>
          	        <!-- Link to 3rd tab -->
          	        <a href="#tab3" class="tab-link button">Tab 3</a>
          	  </div>
          	</div>
	    <div class="page-content">
	      <!-- Tabs animated wrapper, required to switch tabs with transition -->
	      <div class="tabs-animated-wrap">
	        
	        <!-- Tabs, tabs wrapper -->
	        <div class="tabs">
	          <!-- Tab 1, active by default -->
	          <div id="tab1" class="tab active">
	            ... Tab 1 content ...
	          </div>
	 
	          <!-- Tab 2 -->
	          <div id="tab2" class="tab">
	            ... Tab 2 content ...
	          </div>
	 
	          <!-- Tab 3 -->
	          <div id="tab3" class="tab">
	            ... Tab 3 content ...
	          </div>       
	        </div>
	        
	      </div> 
	    </div>
	  </div>
	</div>  
   
      </div>
    </div>
    <?php echo $this->Html->script('framework7.min'); ?>
    <?php echo $this->Html->script('my-app'); ?>

  </body>
</html> 
