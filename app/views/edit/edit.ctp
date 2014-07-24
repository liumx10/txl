
<!--should come back to personal home page
    place holder should be personal information
-->

<ul class="table-view">
  <a href="load_image">
  <li class="table-view-cell">
     <?php echo $this->Html->image('../headimage/'.$photoid, 
                array('width'=>'70px', 'height'=>'70px', 'class'=>'media-object pull-left'));?>
        <div class="media-body margin_name font_default">
            更换头像
        </div>
  </li>
  </a>

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


