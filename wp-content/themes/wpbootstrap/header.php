<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bootstrap, from Twitter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Le styles -->
        <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <?php wp_enqueue_script("jquery"); ?>
        <?php wp_head(); ?>

        <!--         Le javascript
           ================================================== 
            <script src="../assets/js/jquery.js"></script>
            <script src="../bootstrap/js/bootstrap.js"></script>-->
        <!--<script src="bootstrap/js/myjs.js" type="text/javascript"></script>-->
        <script src="<?php bloginfo('template_url'); ?>/bootstrap/js/myjs.js"></script>
    </head>

    <body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">


                        <?php wp_list_pages(array('title_li' => '')); ?>


<!--                        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
<li><a href="#">Link</a></li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">Separated link</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">One more separated link</a></li>
    </ul>
</li>-->
                        <!--<li class="active"><a href="#">Home</a></li>-->
                        <!--              <li><a href="#about">About</a></li>
                                      <li><a href="#contact">Contact</a></li>
                                      <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                          <li><a href="#">Action</a></li>
                                          <li><a href="#">Another action</a></li>
                                          <li><a href="#">Something else here</a></li>
                                          <li class="divider"></li>
                                          <li class="nav-header">Nav header</li>
                                          <li><a href="#">Separated link</a></li>
                                          <li><a href="#">One more separated link</a></li>
                                        </ul>
                                      </li>
                                    </ul>
                                    <form class="navbar-form pull-right">
                                      <input class="span2" type="text" placeholder="Email">
                                      <input class="span2" type="password" placeholder="Password">
                                      <button type="submit" class="btn">Sign in</button>
                                    </form>-->
                    </ul>
                    <!--                    <form class="navbar-form navbar-left" role="search">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Search">
                                            </div>
                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </form>
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="#">Link</a></li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Action</a></li>
                                                    <li><a href="#">Another action</a></li>
                                                    <li><a href="#">Something else here</a></li>
                                                    <li role="separator" class="divider"></li>
                                                    <li><a href="#">Separated link</a></li>
                                                </ul>
                                            </li>
                                        </ul>-->
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container">