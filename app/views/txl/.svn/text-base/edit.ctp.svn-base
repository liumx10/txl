
<!--should come back to personal home page
    place holder should be personal information
-->

<div class="navbar">
  <div class="navbar-inner">
  </div>
</div>

<div class="page no-navbar">
  <div class="page-content">
    <?php echo $this->Html->script('jquery-2.1.1.min'); ?>
    <?php echo $this->Html->script('ajaxfileupload'); ?>

    <style type="text/css">
      body{ font-size:14px;}
      input{ vertical-align:middle; margin:0; padding:0; width:100%;}
      .file-box{ position:relative;width:100%; }
      #textfield{ margin-left:2%; height:22px; border:1px solid #cdcdcd; width: 50%;}
      #submit { background-color:#FFF; border:1px solid #CDCDCD;height:24px; width:19%;}
      #lookthrough { background-color:#FFF; border:1px solid #CDCDCD;height:24px; width:19%;}
      #fileField { position:absolute; top:0; left:0px; height:24px; filter:alpha(opacity:0);opacity: 0; width:70%; }
    </style>

    <div id="edit">
      <div class="list-block media-list">
        
        <div class="item-content" onclick="loadImage()">
          <div class="intem-media">
             <?php echo $this->Html->image('../headimage/'.$photoid, 
                        array('width'=>'70px', 'height'=>'70px'));?>
          </div>
          <div class="item-inner "style="margin-left:50px; padding-top:20px;">
            <div class="item-title" >更换头像</div>
          </div>
        </div>    
      </div>        

      <div class="file-box" id="load_image" style="display:none">
            <input type='text' name='textfield' id='textfield' class='txt' />  
            <input type='button' class='btn' value='浏览...' id="lookthrough"/>
            <input type="file" name="file" id="fileField" size="28" onchange="document.getElementById('textfield').value=this.value" />
            <input type="button" value="上传" id="submit" onclick="ajaxFileUpload()"/>
      </div>
        
      <form action=<?php $this->Html->url(array('action'=>'edit'));?> 
            method="GET" class="ajax-submit list-block">
          <ul>
            <li>
              <div class="item-content">
                <div class="item-inner">
                  <div class="item-title label">电话</div>
                  <div class="item-input">
                    <!-- Make sure that input have "name attrobute" -->
                    <input type="text" id="tel" placeholder="tel">
                  </div>
                </div>
              </div>
            </li>

            <li>
              <div class="item-content">
                <div class="item-inner">
                  <div class="item-title label">微信</div>
                  <div class="item-input">
                    <!-- Make sure that input have "name attrobute" -->
                    <input type="text" id="wechat" placeholder="wechat">
                  </div>
                </div>
              </div>
            </li>
            
            <li>
              <div class="item-content">
                <div class="item-inner">
                  <div class="item-title label">E-mail</div>
                  <div class="item-input">
                    <!-- Make sure that input have "name attrobute" -->
                    <input type="text" id="email" placeholder="E-mail">
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <br />

          <p>
            <a class="back button button-big active" onclick="edit_submit()">
              提交
            </a>
          </p>
          <p>
            <a class="back button button-big active">
              返回
            </a>
          </p>
      </form> 
      
      <input type="hidden" id="load_image_url" value=<?php echo $this->Html->url(array('action'=>'load_image')); ?> >
      <input type="hidden" id="edit_url" value=<?php echo $this->Html->url(array('action'=>'edit')); ?> >
  </div>
</div>
