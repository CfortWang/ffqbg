<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element text-center">
					<span>
						<!-- <a href="/"><img alt="logo" class="navigation-logo" src="/img/logo/logo.png"/></a> -->
					</span>
				</div>
				<div class="logo-element">
					发发圈
				</div>
			</li>
			<li class="{{ isActiveRoute('user', 1) }}">
				<a href="{{ url('/user/list') }}">
					<i class="fa fa-user"></i>
					<span class="nav-label">用户管理</span>
				</a>
				<ul class="nav nav-second-level collapse">
					 @if (Session::get('/user/list'))
					<li class="{{ isActiveRoute('wallet', 2) }}">
						<a href="{{ url('/user/list') }}">用户列表</a>
					</li>
					@endif
					 @if (Session::get('/user/wallet'))
					<li class="{{ isActiveRoute('wallet', 2) }}">
						<a href="{{ url('/user/wallet') }}">账户钱包历史</a>
					</li>
					@endif
					 @if (Session::get('/user/pay'))
					<li class="{{ isActiveRoute('pay', 2) }}">
						<a href="{{ url('/user/pay') }}">支付列表</a>
					</li>
					@endif
					 @if (Session::get('/user/cashout'))
					<li class="{{ isActiveRoute('cashout', 2) }}">
						<a href="{{ url('/user/cashout') }}">提现列表</a>
					</li>
					@endif
					 @if (Session::get('/user/brokerages'))
					<li class="{{ isActiveRoute('brokerages', 2) }}">
						<a href="{{ url('/user/brokerages') }}">佣金管理</a>
					</li>
					@endif
					 @if (Session::get('/user/data'))
					<li class="{{ isActiveRoute('data', 2) }}">
						<a href="{{ url('/user/data') }}">数据统计</a>
					</li>
					@endif
				</ul>
			</li>
			<li class="{{ isActiveRoute('task', 1) }}">
				<a href="{{ url('/task/list') }}">
					<i class="fa fa-tasks"></i>
					<span class="nav-label">任务管理</span>
				</a>
				<ul class="nav nav-second-level collapse">
					 @if (Session::get('/task/list'))
					<li class="{{ isActiveRoute('list', 2) }}">
						<a href="{{ url('/task/list') }}">任务列表</a>
					</li>
					@endif
					 @if (Session::get('/task/join'))
					<li class="{{ isActiveRoute('join', 2) }}">
							<a href="{{ url('/task/join') }}">任务记录</a>
					</li>
					@endif
					 @if (Session::get('/task/create'))
					<li class="{{ isActiveRoute('create', 2) }}">
							<a href="{{ url('/task/create') }}">发布任务</a>
					</li>
					@endif
				</ul>
			</li>
			<li class="{{ isActiveRoute('news', 1) }}">
				<a href="{{ url('/news/list') }}">
					<i class="fa fa-bandcamp"></i>
					<span class="nav-label">新闻管理</span>
				</a>
				<ul class="nav nav-second-level collapse">
					 @if (Session::get('/news/list'))
					<li class="{{ isActiveRoute('list', 2) }}">
						<a href="{{ url('/news/list') }}">新闻列表</a>
					</li>
					@endif
					 @if (Session::get('/news/create'))
					<li class="{{ isActiveRoute('create', 2) }}">
							<a href="{{ url('/news/create') }}">发布新闻</a>
					</li>
					@endif
				</ul>
			</li>
			<li class="{{ isActiveRoute('banner', 1) }}">
				<a href="{{ url('/banner/list') }}">
					<i class="fa fa-wpexplorer"></i>
					<span class="nav-label">广告管理</span>
				</a>
				<ul class="nav nav-second-level collapse">
					 @if (Session::get('/banner/list'))
					<li class="{{ isActiveRoute('list', 2) }}">
						<a href="{{ url('/banner/list') }}">轮播列表</a>
					</li>
					@endif
					 @if (Session::get('/banner/create'))
					<li class="{{ isActiveRoute('create', 2) }}">
							<a href="{{ url('/banner/create') }}">新建</a>
					</li>
					@endif
				</ul>
			</li>
			<li class="{{ isActiveRoute('admin', 1) }}">
				<a href="{{ url('/admin/list') }}">
					<i class="fa fa-users"></i>
					<span class="nav-label">管理员</span>
				</a>
				<ul class="nav nav-second-level collapse">
					 @if (Session::get('/admin/list'))
					<li class="{{ isActiveRoute('list', 2) }}">
						<a href="{{ url('/admin/list') }}">管理员列表</a>
					</li>
					@endif
					 @if (Session::get('/admin/role'))
					<li class="{{ isActiveRoute('role', 2) }}">
						<a href="{{ url('/admin/role') }}">角色列表</a>
					</li>
					@endif
					 @if (Session::get('/admin/role_create'))
					<li class="{{ isActiveRoute('role_create', 2) }}">
						<a href="{{ url('/admin/role_create') }}">创建角色</a>
					</li>
					 @endif
					 @if (Session::get('/admin/create'))
					<li class="{{ isActiveRoute('create', 2) }}">
						<a href="{{ url('/admin/create') }}">创建管理员</a>
					</li>
					@endif
				</ul>
			</li>
			<li class="{{ isActiveRoute('system', 1) }}">
				<a href="{{ url('/system/parameter') }}">
					<i class="fa fa-wrench"></i>
					<span class="nav-label">系统设置</span>
				</a>
				<ul class="nav nav-second-level collapse">
					 @if (Session::get('/system/limit'))
					<li class="{{ isActiveRoute('list', 2) }}">
						<a href="{{ url('/system/limit') }}">用户限制</a>
					</li>
					@endif
					 @if (Session::get('/system/parameter'))
					<li class="{{ isActiveRoute('parameter', 2) }}">
						<a href="{{ url('/system/parameter') }}">参数设置</a>
					</li>
					@endif
					 @if (Session::get('/system/member'))
					<li class="{{ isActiveRoute('member', 2) }}">
						<a href="{{ url('/system/member') }}">会员设置</a>
					</li>
					@endif
					 @if (Session::get('/system/task'))
					<li class="{{ isActiveRoute('task', 2) }}">
						<a href="{{ url('/system/task') }}">任务设置</a>
					</li>
					@endif
					 @if (Session::get('/system/code'))
					<li class="{{ isActiveRoute('code', 2) }}">
						<a href="{{ url('/system/code') }}">验证码列表</a>
					</li>
					@endif
					 @if (Session::get('/system/protocol'))
					<li class="{{ isActiveRoute('protocol', 2) }}">
						<a href="{{ url('/system/protocol') }}">用户协议</a>
					</li>
					@endif
				</ul>
			</li>
		</ul>
	</div>
</nav>
