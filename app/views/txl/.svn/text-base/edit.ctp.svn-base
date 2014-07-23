
<!--should come back to personal home page
    place holder should be personal information
-->

<?php echo $this->Html->script('jquery-2.1.1.min'); ?>
<script>
    var loadImage;
    $(document).ready(function(){
        loadImage = function loadImage(){
             $('#load_image').show();
        }

    });
</script>
<style type="text/css">
    body{ font-size:14px;}
    input{ vertical-align:middle; margin:0; padding:0; width:100%;}
    .file-box{ position:relative;width:100%; }
    #textfield{ margin-left:2%; height:22px; border:1px solid #cdcdcd; width: 55%;}
    #submit { background-color:#FFF; border:1px solid #CDCDCD;height:24px; width:19%;}
    #lookthrough { background-color:#FFF; border:1px solid #CDCDCD;height:24px; width:19%;}
    #fileField { position:absolute; top:0; left:0px; height:24px; filter:alpha(opacity:0);opacity: 0; width:78%; }
</style>

<div id="edit">
    <ul class="table-view">
    <div onclick="loadImage()">
      <li class="table-view-cell">
         <?php echo $this->Html->image('../headimage/'.$photoid, 
                    array('width'=>'70px', 'height'=>'70px', 'class'=>'media-object pull-left'));?>
            <div class="media-body margin_name font_default">
                更换头像
            </div>
      </li>
    <div>
    
    <div class="file-box" id="load_image" style="display:none">
      <form action="load_image" method="post" enctype="multipart/form-data" style="width:100%">
          <input type='text' name='textfield' id='textfield' class='txt' />  
          <input type='button' class='btn' value='浏览...' id="lookthrough"/>
          <input type="file" name="data[Employee][photo]" class="file" id="fileField" size="28" onchange="document.getElementById('textfield').value=this.value" />
         <input type="submit" name="submit" class="btn" value="上传" id="submit"/>
      </form>
    </div>

    <form class="input-group font_tiny" action="edit" method="post">
      <div class="input-row">
        <label>微信号码</label>
        <input type="text" name="wechat" placeholder=<?php echo $wechat; ?>>
      </div>
      <div class="input-row">
        <label>手机号码</label>
        <input type="text" name="tel" placeholder=<?php echo $tel; ?>>
      </div>
      <div class="input-row">
        <label>电子邮箱</label>
        <input type="text" name="email" placeholder=<?php echo $email; ?> >
      </div>
      <br/>
      <button class="btn btn-primary btn-block">提交</button>
    </form>

    <a href=<?php echo $this->Html->url(array('controller'=>'txl', 'action'=>'show_people', $myid));?>>
      <button class="btn btn-primary btn-block">返回</button>
    </a>
  </ul>
</div>
