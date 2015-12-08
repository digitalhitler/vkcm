<!DOCTYPE html>
<html>
<head lang="en">

  <!-- Meta tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <meta name="description" content="VKCM - Advanced vk.com content manager for groups and public pages" />
  <meta name="keywords" content="vkcm,admin,group,vk.com,vkontakte" />
  <meta name="author" content="Sergey S Petrenko mailto:spetrenko@me.com" />

  <!-- Page title -->
  <title>VKCM</title>

  <!-- Styles -->
  <link rel='stylesheet' type='text/css' href='/fonts/sourcesanspro/sourcesanspro.css'>
  <link rel='stylesheet' type='text/css' href='/build/env/env.css'>
  <link rel='stylesheet' type='text/css' href='/build/general.css'>

  <!-- Legacy bullshit -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
</head>
<body>
  <header id="topbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span><a class="navbar-brand" href="/"><img src="/assets/i/logo_header.png" /></a></span>
    </div>

    <div class="navbar-collapse collapse sidebar-navbar-collapse">
      <div class="container-fluid">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/"><i class="glyphicon glyphicon-user"></i> Profile</a></li>
          <li><a href="/"><i class="glyphicon glyphicon-plus"></i> Account</a></li>
          <li><a href="/"><i class="glyphicon glyphicon-cog"></i> Settings</a></li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span> 7 - Items<span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-cart" role="menu">
              <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="http://lorempixel.com/50/50/" alt="" />
                        <span class="item-info">
                            <span>Item name</span>
                            <span>23$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
              </li>
              <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="http://lorempixel.com/50/50/" alt="" />
                        <span class="item-info">
                            <span>Item name</span>
                            <span>23$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
              </li>
              <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="http://lorempixel.com/50/50/" alt="" />
                        <span class="item-info">
                            <span>Item name</span>
                            <span>23$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
              </li>
              <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="http://lorempixel.com/50/50/" alt="" />
                        <span class="item-info">
                            <span>Item name</span>
                            <span>23$</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <button class="btn btn-xs btn-danger pull-right">x</button>
                    </span>
                </span>
              </li>
              <li class="divider"></li>
              <li><a class="text-center" href="">View Cart</a></li>
          </ul>
        </li>
        </ul>
      </div>
    </div>
  </header>
<div id="app">
  <div id="sidebar-wrapper" class="col-md-2">
    <nav class="dashboard-nav" id="sidebar">
      <ul class="nav navbar-nav">
        <li class="sidebar-headline">
          <h5>
                        Milestone
                        <span class="pull-right">30%</span>
                      </h5>
        <li class="searchbox" style="border-top: 1px #ccc solid; border-bottom: 1px #ccc solid;">
search
        </li>
        <li class="sidebar-form">
        </li>
        <li class="hoverable">
          <a href="#" class="navbar-expand-toggle">
            <i class="icon vi-megaphone"></i>
            <span>Services</span>
            <i class="badge">3</i>
            <b class="caret"></b></a>
        </li>
        <li class="subnav-container">
          <ul>
            <li><a href="/"><span>Carwashes</span></a></li>
            <li><a href="/"><span>Lapdances</span></a></li>
            <li><a href="/"><span>Musicals</span></a></li>
            <li><a href="/"><span>Tutorials</span></a></li>
            <li><a href="/"><span>Catering</span></a></li>
          </ul>
        </li>
      </ul>
      <div>
        dsdsds
      </div>
    </nav><!--/.sidebar-nav -->
  </div>
  <div id="main-wrapper" class="col-md-10 pull-right">
    <main>
      <div class="container-fluid">
        <div class="navbar-inner">
          <!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						Marcus Doe
					</div>
					<div class="profile-usertitle-job">
						Developer
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
			   Some user related content goes here...
            </div>
		</div>
	</div>
</div>
<center>
<strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">KeenThemes</a></strong>
</center>
<br>
<br>
<style>

/* Profile container */
.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}

.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}</style>
    <div class="container" style="width: auto;"> <a class="brand" href="#">JavaScript</a>

      <ul class="nav" role="navigation">
        <li class="dropdown"> <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>

          <ul
          class="dropdown-menu" role="menu" aria-labelledby="drop1">
            <li><a tabindex="-1" href="http://google.com">Action</a>

            </li>
            <li><a tabindex="-1" href="#anotherAction">Another action</a>

            </li>
            <li><a tabindex="-1" href="#">Something else here</a>

            </li>
            <li class="divider"></li>
            <li><a tabindex="-1" href="#">Separated link</a>

            </li>
      </ul>
      </li>
      <li class="dropdown"> <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Dropdown 2 <b class="caret"></b></a>

        <ul
        class="dropdown-menu" role="menu" aria-labelledby="drop2">
          <li><a tabindex="-1" href="#">Action</a>

          </li>
          <li><a tabindex="-1" href="#">Another action</a>

          </li>
          <li><a tabindex="-1" href="#">Something else here</a>

          </li>
          <li class="divider"></li>
          <li><a tabindex="-1" href="#">Separated link</a>

          </li>
          </ul>
      </li>
      </ul>
      <ul class="nav pull-right">
        <li id="fat-menu" class="dropdown"> <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">Dropdown 3 <b class="caret"></b></a>

          <ul
          class="dropdown-menu" role="menu" aria-labelledby="drop3">
            <li><a tabindex="-1" href="#">Action</a>

            </li>
            <li><a tabindex="-1" href="#">Another action</a>

            </li>
            <li><a tabindex="-1" href="#">Something else here</a>

            </li>
            <li class="divider"></li>
            <li><a tabindex="-1" href="#">Separated link</a>

            </li>
      </ul>
      </li>
      </ul>
    </div>
  </div>
</div>
<p>The beauty of this implementation is that the menu drops down only after the mouse rests over it for a little while. If you just move over the menu, nothing happens so you don't get distracted. </p>
<p>Compare it over a <a href="http://jsfiddle.net/ekjxu/" target="_top">CSS Only implementation</a> where menus fall down immediately.</p>

        <div class="col-md-6">
          <h3><a>Scale the page</a> to see the collapsed sidebar on small screens</h3>

            <input type="text" id="search-query" class="search_field" autocomplete="off" autocorrect="off" autocapitalize="off">

<p>
<select>
  <option>dsads</option>
  <option>dsads</option>
  <option>dsads</option>
  <option>dsads</option>
  <option>dsads</option>
</select>
</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rhoncus venenatis ante ac vestibulum. Curabitur congue, leo non elementum interdum, sapien erat iaculis felis, ut vulputate turpis mauris molestie lorem. Integer urna libero, pharetra sit amet massa in, blandit tempor eros. Nulla risus arcu, lacinia vel felis quis, varius gravida erat. Duis molestie, dolor et porttitor iaculis, mi dui aliquet justo, at mattis nisi leo vel nunc. In dapibus est aliquet, auctor nisl a, interdum felis. Donec sed ligula in ligula hendrerit congue non tristique risus. Morbi sollicitudin ligula non erat placerat, non vulputate nibh rutrum. Phasellus consectetur nibh sit amet ipsum sagittis, et lobortis ligula sollicitudin. Nunc ac diam non diam lacinia bibendum lacinia in magna. Morbi non ante eget ante aliquam porttitor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse potenti. Vestibulum faucibus turpis sit amet mauris accumsan volutpat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent condimentum arcu ut erat commodo, eu porta mauris hendrerit.</p>
        </div>

        <div class="col-md-6">
          <h3>It is important to keep all the text on the main page within the page-wrapper</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rhoncus venenatis ante ac vestibulum. Curabitur congue, leo non elementum interdum, sapien erat iaculis felis, ut vulputate turpis mauris molestie lorem. Integer urna libero, pharetra sit amet massa in, blandit tempor eros. Nulla risus arcu, lacinia vel felis quis, varius gravida erat. Duis molestie, dolor et porttitor iaculis, mi dui aliquet justo, at mattis nisi leo vel nunc. In dapibus est aliquet, auctor nisl a, interdum felis. Donec sed ligula in ligula hendrerit congue non tristique risus. Morbi sollicitudin ligula non erat placerat, non vulputate nibh rutrum. Phasellus consectetur nibh sit amet ipsum sagittis, et lobortis ligula sollicitudin. Nunc ac diam non diam lacinia bibendum lacinia in magna. Morbi non ante eget ante aliquam porttitor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse potenti. Vestibulum faucibus turpis sit amet mauris accumsan volutpat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent condimentum arcu ut erat commodo, eu porta mauris hendrerit.</p>
        </div>
      </div>
    </main>
  </div>
</div>
