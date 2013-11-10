<!DOCTYPE html>
<html lang="en-us">
        <head>
                <meta charset="utf-8">
                <title>StaffsLAN v1.0</title>
                <meta name="viewport" content="width=1024">
                <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

                <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
                <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
                <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
                <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
                <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">

                <script type="text/javascript">
                <?php if($current_user && $current_user->hasTicket()) { ?>
                    var ticket_type = '<?php echo ($current_user->getTicket()->is_volunteer == 1 ? "volunteer" : "player"); ?>';
                <?php } ?>
                </script>

                <script src="/assets/js/script.js"></script>
                <link href="/assets/css/lan.css" rel="stylesheet">

                <!-- Page Assets -->
                <?php echo Asset::render('page_assets'); ?>
        </head>
        <body>
        	<nav class="navbar navbar-fixed-top navbar-default" role="navigation">
        		<div class="container container-full">
                    <div class="row">
                        <div class="col-xs-2 col-sm-1 col-md-2" id="site-logo">
                            StaffsLAN
                        </div>

                        <div class="col-xs-10 col-sm-11 col-md-10" id="sitebar">
                            <?php if(isset($current_user)) { ?>
                            <span class="refresh"><i class="fa fa-refresh"></i> <a href="/auth/go/oauth">Refresh your Data</a></span>
                            <?php if(!empty($current_user->avatar_url)) echo '<img class="avatar" src="' . $current_user->avatar_url . '" />'; ?> 
                            Welcome <em><?=$current_user->username;?></em>
                            <span class="logout"><i class="fa fa-sign-out"></i> <a href="/auth/logout">Logout</a></span>
                            <?php } ?>
                        </div>
                    </div>
        		</div>
        	</nav>

        	<div class="container container-full">
	        	<div class="row">
	        		<div id="sidebar" class="col-sm-1 col-md-2">
    	    			<ul>
	        				<li><a href="/"><i class="fa fa-home"></i><span class="hidden-sm">LAN Home</span></a></li>
	        				<li><a href="/survey/view/1"><i class="fa fa-ticket"></i><span class="hidden-sm">Online Check-in</span></a></li>
	        				<li><a href="/map/"><i class="fa fa-map-marker"></i><span class="hidden-sm">Live Map</span></a></li>
	        				<li><a href="http://staffsvgs.challonge.com"><i class="fa fa-sitemap"></i><span class="hidden-sm">Tournaments</span></a></li>
	        				<li><a href="#" class="coming-soon"><i class="fa fa-signal"></i><span class="hidden-sm">Servers</span></a></li>
	        				<li><a href="https://www.google.com/calendar/embed?src=dHdlZWRsZXIuY28udWtfcDNlaXNsNTdwaXZsaGw0aHQyZ3Q3OGJsNDBAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ"><i class="fa fa-calendar"></i><span class="hidden-sm">Schedule</span></a></li>
	        				<li><a href="/information/"><i class="fa fa-info"></i><span class="hidden-sm">Information</span></a></li>
	        				<li><a href="/sign/"><i class="fa fa-sign-in"></i><span class="hidden-sm">Sign in/out</span></a></li>
	        				<li><a href="#" class="coming-soon"><i class="fa fa-question"></i><span class="hidden-sm">Call for Help!</span></a></li>
                            <li><a href="/survey/"><i class="fa fa-list-alt"></i><span class="hidden-sm">Surveys</span></a></li>
	        			</ul>
	        		</div>
	        		<div id="content" class="col-sm-11 col-md-10 ">
                        <div id="messages">
                            <?php foreach($messages as $message) { echo $message; } ?>
                        </div>
