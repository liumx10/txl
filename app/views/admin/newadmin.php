<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="dlee" content="">
    <title>通讯录管理系统</title>
<?php
echo $this->Html->css('bootstrap.min');
echo $this->Html->css('sb-admin');
echo $this->Html->css('font-awesome-4.1.0/css/font-awesome.min');
echo $this->Html->css('fancytree/skin-lion/ui.fancytree.min');
?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="javascript:location.reload();">通讯录管理系统</a>
            </div>
			<ul class="nav navbar-left top-nav" style="margin-left:45px;">
				<li>
					<a onclick="moveBack();return false;" href="#">
						<i class="fa fa-fw fa-reply"></i>返回上级</a>
				</li>
				<li>
					<a onclick="$('#newDepDiv').slideDown();$('#newDepText').focus();return false;" 
						href="#"><i class="fa fa-fw fa-users"></i> 添加部门</a>
				</li>
				<li>
					<a onclick="rmDepartment();return false;" href="#">
						<i class="fa fa-fw fa-trash-o"></i>删除部门</a>
				</li>
			</ul>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li>
					<a href="signout">
						<i class="fa fa-fw fa-sign-out"></i>退出系统</a>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="groupsPane" class="nav navbar-nav side-nav">
                    <li class='groupName'>
                        <a href="javascript:;"> 没有公司</a>
                    </li>
                    <li id="functional">
						<div id="newDepDiv" style="display:none;">
							<input style="margin-left:30px;"id="newDepText" type="text">
						</div>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                            <div class="panel panel-primary">
								<div class="panel-body">
									<button onclick="newContact();" class="btn">
										<i class="fa fa-fw fa-user "></i> 添加员工</button>
									<button class="btn" onclick="rmContacts();">
										<i class="fa fa-fw fa-trash-o"></i> 删除员工</button>
									<button class="btn" data-toggle="modal" data-target="#move">
										<i class="fa fa-fw fa-copy"></i> 增至部门</button>
									<button onclick="apply();" class="btn">
										<i class="fa fa-fw fa-check-circle-o"></i> 应用变更</button>
									<button class="btn" data-toggle="modal" data-target="#info">
										<i class="fa fa-fw fa-envelope-o"></i> 发送通知</button>
									<a id="printer" style="color:inherit;">
									<button onclick="print();" class="btn" >
										<i class="fa fa-fw fa-print"></i> 导出excel</button></a>
								</div>
                            </div>
					</div>
				</div>
                <div class="row">
                    <div class="col-lg-12" id="backinfo">
					</div>
				</div>
                <div class="row">
                    <div class="col-lg-12">
						<table class="table">
							<thead> <tr>
								<td><input type="checkbox" id="selectA" onclick="selectAll();"></td>
								<td>姓名</td>
								<td>职位</td>
								<td>手机</td>
								<td>微信</td>
								<td>电子邮件</td>
							</tr> </thead>
							<tbody id="contacts"> <tr>
							</tr> </tbody>
						</table>
                    </div>
                </div>

<div style="width:100%;padding-bottom:650px;"></div>
</div>
	 </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
echo $this->Html->script('jquery-2.1.1.min.js');
echo $this->Html->script('jquery-ui.min.js');
echo $this->Html->script('bootstrap.min.js');
echo $this->Html->script('sprintf.js');
echo $this->Html->script('ui.js');
echo $this->Html->script('script.js');
echo $this->Html->script('fancytree/jquery.fancytree-all.js');
?>
<input type="hidden" id="parent" value="1">
<input type="hidden" id="active" value="1">
<input type="hidden" id="comid" value="1">
<input type="hidden" id="comname" value="没有公司">
<!--================================================================-->
<!-- send info -->
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">通知</h4>
      </div>
      <div class="modal-body">
		<textarea style="width:500px;height:100px;"name="haha" id="infotext"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button onclick="mail();" type="button" class="btn btn-primary" data-dismiss="modal">发送</button>
      </div>
    </div>
  </div>
</div>
<!--================================================================-->
<!--================================================================-->
<!-- add to another department -->
<div class="modal fade" id="move" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">选择部门</h4>
      </div>
      <div class="modal-body" id="tree">
<!--tree here-->

<!--============-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button onclick="move();" type="button" class="btn btn-primary" data-dismiss="modal">确定</button>
      </div>
    </div>
  </div>
</div>
<!--================================================================-->
</body>
</html>
