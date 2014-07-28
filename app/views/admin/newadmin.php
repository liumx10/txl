<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Bootstrap Admin Template</title>
<?php
echo $this->Html->css('bootstrap.min');
echo $this->Html->css('sb-admin');
echo $this->Html->css('font-awesome-4.1.0/css/font-awesome.min');
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
					<a onclick="rmDepartment();return false;" href="#">
						<i class="fa fa-fw fa-trash-o"></i>删除部门</a>
				</li>
				<li>
					<a onclick="moveBack();return false;" href="#">
						<i class="fa fa-fw fa-reply"></i>返回上级</a>
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
                        <a onclick="$('#newDepDiv').slideDown();$('#newDepText').focus();return false;" href="#"><i class="fa fa-fw fa-users"></i> 添加部门</a>
						<div id="newDepDiv" style="display:none;">
							<input style="margin-left:30px;"id="newDepText" type="text">
						</div>
                        <a onclick="newContact();return false;" href="#"><i class="fa fa-fw fa-user "></i> 添加员工</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                            <div class="panel panel-primary" id="fix">
								<div class="panel-body">
									<input type="checkbox" id="selectA" onclick="selectAll();"> 
									<a href="#" onclick="rmContacts();return false;">
										<i class="fa fa-fw fa-trash-o"></i>删除</a>
									<a onclick="move(); return false;" href="#">
										<i class="fa fa-fw fa-folder-o"></i>添加至</a>
									<a onclick="apply();return false;" href="#">
										<i class="fa fa-fw fa-save"></i>应用修改</a>
									<a href="#" data-toggle="modal" data-target="#myModal">
										<i class="fa fa-fw fa-envelope-o"></i> 通知</a>
									<a onclick="print();" href="#" id="printer" download>
										<i class="fa fa-fw fa-print"></i> 打印</a>
								</div>
                            </div>
					</div>
				</div>
                <div class="row">
                    <div class="col-lg-12">
						<table class="table">
							<thead> <tr>
								<td><input type="checkbox" style="display:none;"></td>
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
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
echo $this->Html->script("jquery-2.1.1.min.js");
echo $this->Html->script("bootstrap.min.js");
echo $this->Html->script("sprintf.js");
echo $this->Html->script("newui.js");
echo $this->Html->script("newscript.js");
?>
<input type="hidden" id="parent" value="1">
<input type="hidden" id="active" value="1">
<!--================================================================-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">通知</h4>
      </div>
      <div class="modal-body">
		<textarea style="width:500px;height:100px;"name="haha" id="info"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button onclick="mail();" type="button" class="btn btn-primary" data-dismiss="modal">发送</button>
      </div>
    </div>
  </div>
</div>
<!--================================================================-->
</body>
</html>
