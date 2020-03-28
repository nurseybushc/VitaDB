<?
	error_reporting(E_ERROR | E_PARSE);
	/*include 'db_connection.php';
	include 'xsrf.php';
	$con = OpenCon();
	$xsrf = createXSRF($con);
	CloseCon($con);
	setcookie("XSRF-TOKEN", $xsrf);*/
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>VitaDB by Vita Nuova</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<link rel="stylesheet" href="templates/lumino/css/bootstrap.min.css">
		<link rel="stylesheet" href="templates/lumino/css/datepicker3.css">
		<link rel="stylesheet" href="js/dependencies/alertify.js-master/dist/css/alertify.css" id="alertifyCSS">
		<link rel="stylesheet" href="css/font-awesome/css/fontawesome-all.min.css">
		<link rel="stylesheet" type="text/css" href="js/dependencies/tooltipster-master/dist/css/tooltipster.bundle.min.css" />
		<script src="node_modules/angular/angular.min.js"></script>

		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	</head>
	<body ng-app="VitaDB">
		<input type='hidden' name='_csrf' value='<%= _csrf %>'>
		<nav class="navbar navbar-inverse navbar-fixed-top navbar-login" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#/"><span>Vita</span>DB</a>
					<ul class="user-menu">
						<li class="dropdown pull-right">
							<a href="" class="dropdown-toggle" data-toggle="dropdown">
								<svg class="glyph stroked male-user">
									<use xlink:href="#stroked-male-user"></use>
								</svg>
								{{user.name}}<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li ng-if="user">
									<a href="#profile">
										<svg class="glyph stroked male user ">
											<use xlink:href="#stroked-male-user"/>
										</svg>		
										Profile
									</a>
								</li>
								<li ng-if="user">
									<a href="#logout">
										<svg class="glyph stroked lock">
											<use xlink:href="#stroked-lock"/>
										</svg>
										Logout
									</a>
								</li>
								<li ng-if="!user">
									<a href="#login">
										<svg class="glyph stroked lock">
											<use xlink:href="#stroked-lock"/>
										</svg>
										Login
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<!-- /.container-fluid -->
		</nav>
		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar collapse">
			<ul class="nav menu">
				<li>
					<a href="#/">
						<i class="fa fa-gamepad" aria-hidden="true"></i> &nbsp;
						Homebrews
					</a>
				</li>
				<li>
					<a href="#/plugins">
						<i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;
						Plugins
					</a>
				</li>
				<li>
					<a href="#/tools">
						<i class="fa fa-laptop" aria-hidden="true"></i> &nbsp;
						PC Tools
					</a>
				</li>
				<li role="presentation" class="divider"></li>
				<li>
					<a href="#/bounties">
						<i class="fa fa-credit-card" aria-hidden="true"></i> &nbsp;
						Bounties Tracker
					</a>
				</li>
				<li>
					<a href="#/titleids">
						<i class="fa fa-list" aria-hidden="true"></i> &nbsp;
						Titles List
					</a>
				</li>
				<li>
					<a href="https://discord.gg/PyCaBx9">
						<i class="fab fa-discord" aria-hidden="true"></i> &nbsp;
						Discord Server
					</a>
				</li>
				<li role="presentation" class="divider"></li>
				<li>
					<a href="#/api">
						<i class="fa fa-desktop" aria-hidden="true"></i> &nbsp;
						Developer Api
					</a>
				</li>
				<li>
					<a href="#/staff">
						<i class="fa fa-users" aria-hidden="true"></i> &nbsp;
						Staff List
					</a>
				</li>
				<li>
					<a href="#/supporters">
						<i class="fab fa-patreon" aria-hidden="true"></i> &nbsp;
						Supporters
					</a>
				</li>
				<li role="presentation" class="divider"></li>
				<li ng-if="user && user.role < 3">
					<a href="#/submit">
						<i class="fa fa-plus" aria-hidden="true"></i> &nbsp;
						Submit a new homebrew
					</a>
				</li>
				<li ng-if="user  && user.role < 3">
					<a href="#/submit2">
						<i class="fa fa-plus" aria-hidden="true"></i> &nbsp;
						Submit a new plugin
					</a>
				</li>
				<li ng-if="user  && user.role < 3">
					<a href="#/submit3">
						<i class="fa fa-plus" aria-hidden="true"></i> &nbsp;
						Submit a new PC tool
					</a>
				</li>
				<li ng-if="user  && user.role < 3">
					<a href="#/submit4">
						<i class="fa fa-plus" aria-hidden="true"></i> &nbsp;
						Submit a new bounty
					</a>
				</li>
				<li ng-if="user">
					<a href="#logout">
						<svg class="glyph stroked cancel">
							<use xlink:href="#stroked-cancel"/>
						</svg>
						Logout
					</a>
				</li>
				<li ng-if="!user">
					<a href="#login">
						<svg class="glyph stroked lock">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-lock"></use>
						</svg>
						Login
					</a>
					<a href="#register">
						<svg class="glyph stroked pencil">
							<use xlink:href="#stroked-pencil"/></use>
						</svg>
						Register
					</a>
				</li>
			</ul>
		</div>
		<div ng-view class="slide page"></div>
	</body>

	<script src="js/dependencies/angular-css.min.js"></script>
	<script src="node_modules/ngload-min.js"></script>
	<script src="node_modules/angular-route/angular-route.min.js"></script>
	<script src="node_modules/angular-animate/angular-animate.min.js"></script>
	<script src="js/dependencies/angular-filter.min.js"></script>
	<script src="js/dependencies/angular-file-upload.min.js"></script>
	<script src="js/dependencies/md5.min.js"></script>
	<script src="templates/lumino/js/lumino.glyphs.js"></script>
	<script src="templates/lumino/js/jquery-1.11.1.min.js"></script>
	<script src="js/dependencies/alertify.js-master/dist/js/alertify.js"></script>
	<script src="js/dependencies/angular-marquee.js"></script>
	<script src="templates/lumino/js/bootstrap.min.js"></script>
	<script src="templates/lumino/js/bootstrap-datepicker.js"></script>
	<script src="js/dependencies/tooltipster-master/dist/js/tooltipster.bundle.min.js"></script>

	<script src="app.js"></script>
	<script src="home/home.controller.js"></script>
	<script src="home/home2.controller.js"></script>
	<script src="home/home3.controller.js"></script>
	<script src="home/api.controller.js"></script>
	<script src="home/titleslist.controller.js"></script>
	<script src="home/info.controller.js"></script>
	<script src="home/staff.controller.js"></script>
	<script src="home/supporters.controller.js"></script>
	<script src="home/bounties.controller.js"></script>
	<script src="login/login.controller.js"></script>
	<script src="login/logout.controller.js"></script>
	<script src="login/register.controller.js"></script>
	<script src="submit/submit.controller.js"></script>
	<script src="submit/submit2.controller.js"></script>
	<script src="submit/submit3.controller.js"></script>
	<script src="submit/submit4.controller.js"></script>
	<script src="submit/edit.controller.js"></script>
	<script src="user/info.controller.js"></script>
	<script src="user/profile.controller.js"></script>

</html>