<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated flipInY">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">修改密码</h4>
			</div>
			<div class="modal-body">
				<div id='pwd_alert' class="alert alert-warning" style="display: none;">
					<a href="#" class="close" data-dismiss="alert">
						&times;
					</a>
				</div>
				<div>
					<form class="form-horizontal">
						<div class="form-group">
							<label class="col-lg-3 control-label">新密码：</label>

							<div class="col-lg-8">
								<input type="password" placeholder="新密码" id="new_pwd" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">确认新密码：</label>

							<div class="col-lg-8">
								<input type="password" placeholder="确认新密码" id="ok_new_pwd" class="form-control">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" id='close'>关闭</button>
				<button type="button" class="btn btn-primary" id="update_upwd">提交更改</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav" id="side-menu">
			<li class="nav-header">

				<div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" style="width:64px;height: 64px" src="upload/admin.jpg" />
                             </span>
					<a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
						<span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Admin</strong>
                             </span> <span class="text-muted text-xs block">超级管理员 <b class="caret"></b></span> </span>
					</a>
					<ul class="dropdown-menu animated fadeInRight m-t-xs">
						<li>
							<a href="form_avatar.html">修改头像</a>
						</li>
						<li>
							<a href="profile.html">个人资料</a>
						</li>
						<li>
							<a href="#" data-toggle="modal" data-target="#myModal">修改密码</a>
						</li>
						<li>
							<a href="mailbox.html">信箱</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="login.html">安全退出</a>
						</li>
					</ul>
				</div>
				<div class="logo-element">
					H+
				</div>

			</li>
			<li class="active">
				<a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">教学信息审核</span> <span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a class="teach_info_nopass">未审核</a>
					</li>
					<li>
						<a class="teach_info_pass">已审核</a>
					</li>
					
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-columns"></i> <span class="nav-label">毕业设计信息审核</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a class="graduate_info_nopass">未审核</a>
					</li>
					<li>
						<a class="graduate_info_pass">已审核</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa fa-globe"></i> <span class="nav-label">额外信息审核</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a class="extra_info_nopass">未审核</a>
					</li>
					<li>
						<a class="extra_info_pass">已审核</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">用户管理</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a class="user_control">用户管理</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-flask"></i> <span class="nav-label">课程管理</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a class="course_control">课程管理</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-flask"></i> <span class="nav-label">毕业设计管理</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a class="graduation_design">毕设管理</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-edit"></i> <span class="nav-label">工作量管理</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a class="worknum_management">工作量管理</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">额外工作量管理</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a class="extra_work">额外工作量管理</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">信息导入</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="search_results.html">用户信息</a>
					</li>
					<li>
						<a href="lockscreen.html">课程信息</a>
					</li>
					<li>
						<a href="404.html">毕业设计信息</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">邮箱 </span><span class="label label-warning pull-right">16</span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="mailbox.html">收件箱</a>
					</li>
					<li>
						<a href="mail_detail.html">查看邮件</a>
					</li>
					<li>
						<a href="mail_compose.html">写信</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#"><i class="fa fa-laptop"></i> <span class="nav-label">系统帮助</span></a>
			</li>
			
		</ul>

	</div>
</nav>