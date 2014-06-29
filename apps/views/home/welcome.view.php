<!DOCTYPE html>
<?php
use Cygnite\AssetManager\Asset;
use Cygnite\Common\UrlManager\Url;
use Cygnite\AssetManager\AssetCollection;
?>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <title>Welcome to Cygnite Framework</title>
<?php echo Asset::style('assets/css/cygnite/style.css'); ?>
        <link rel="shortcut icon" href="<?php echo Url::getBase(); ?>assets/img/cygnite/fevicon.png" > </link>

        <link href="http://fonts.googleapis.com/css?family=Corben:bold" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Nobile" rel="stylesheet" type="text/css"></link>
    </head>
    <body style="background: #F4F5F7;">

        <div class="container" >
            <div class="header">
                <div style="padding: 5px; ">
                    <div align="center" > <h3 class="text-center"   style="color:#fff !important;">
							<strong style="font-weight: bolder; font-size: 40px;"> Welcome </strong> to Cygnite Framework </h3>
                        <span style="font-size: 15px; color: #F6F6F1; ">A modern PHP Framework for Web developers</span>
                    </div>
                </div>
            </div>

            <div class="container-body">

                <div class="container">
                    <div align="center">
                        <h2 class="text-center">Why you'll love Cygnite Framework?</h2>
                        <hr class="featurette-divider"></hr>
                    </div>
                    <p class="lead" style="font-family: small-caption;font-size: 25px;padding-left: 11px;">
                        Cygnite packed with various awesome features to make your development very simple and enjoyable.
                        You may be beginner or advance professional, Cygnite welcomes you all the way.</p>

                    <hr class="featurette-divider"></hr>


                    <ul class="thumbnails">
                        <li class="span3">
                            <div class="feature-block">
                                <div class="features-head">
                                    <h3 class="title">
                                        <a href="http://www.cygniteframework.com/2013/07/introduction.html">Better <span class="title-em">Performance</span></a></h3>
                                </div>
                                <p> Cygnite gives you exceptional performance because of it's lazy loading mechanisam. </p>
                            </div>
                        </li>
                        <li class="span3">
                            <div class="feature-block">
                                <div class="features-head">
                                    <h3 class="title">
                                        <a href="http://www.cygniteframework.com/2013/08/controllers.html">User  <span class="title-em">Friendly</span></a></h3>
                                </div>
                                <p> With simple clear syntax and out of box configuration. You'll love it.
                                 </p>
                            </div>
                        </li>

                        <li class="span3">
                            <div class="feature-block">
                                <div class="features-head">
                                    <h3 class="title">
                                        <a href="http://www.cygniteframework.com/2013/08/routing.html">RESTful  <span class="title-em">Routing</span></a></h3>
                                </div>
                                <p>Use various routing with simple closure or controller support that, leads you to build powerful RESTful API. </p>
                            </div>
                        </li>
						
						<li class="span3">
                            <div class="feature-block">
                                <div class="features-head">
                                    <h3 class="title">
                                        <a href="http://www.cygniteframework.com/2014/03/ioc-container.html">IoC  <span class="title-em">Container</span></a></h3>
                                </div>
                                <p>Stay flexible and build decoupled software using Cygnite IoC; Inject into the controller without any configuration.</p>
                            </div>
                        </li>
						
						<li class="span3">
                            <div class="feature-block">
                                <div class="features-head">
                                    <h3 class="title">
                                        <a href="http://www.cygniteframework.com/2013/08/active-record.html">Active <span class="title-em">Record</span></a></h3>
                                </div>
                                <p> Cygnite provide simple and amusing ActiveRecord implementation for working with  database.  Each model interact with database table. </p>
                            </div>
                        </li>
						
						<li class="span3">
                            <div class="feature-block">
                                <div class="features-head">
                                    <h3 class="title">
                                        <a href="http://www.cygniteframework.com/2014/03/console-overview.html"> Cygnite <span class="title-em">CLI</span></a></h3>
                                </div>
                                <p> Generating code using using crud generator is amusing. Cygnite provide you quick way to manage your schema version using Migration system.   </p>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="clear"> </div>
            <hr class="featurette-divider">

            <div class="footer" >
                <div class="footer-inner-left"> </div>
                <div class="footer-inner" align="center">
                    <div class="footerrow tweets"  >
                        <p style="font-size: 16px;">If you are exploring Cygnite Framework for the first time,
                            you should read the <br><a href="http://www.cygniteframework.com/2013/07/quickstart.html">Quick Guide</a> </p>
                        <p style="font-size: 18px;">You will love the simplicity of Cygnite Framework</p>
                    </div>

                    <div class="footerrow" align="center" style="clear:both;padding-top: 0px;">
                        <div class="footer-hr"></div>

<?php echo \Cygnite\Foundation\Application::poweredBy(); ?>
                    </div>
                </div>
                <div class="footer-inner-right"> </div>
                <div class="clear"> </div>
            </div>

            <!-- ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
<?php echo Asset::script('assets/js/cygnite/jquery.js'); ?>

<style type="text/css">

                    .feature-block{ float: left;border:0px; font-size: 17px;font-family: small-caption;}
                    .feature-block:hover{box-shadow:none;}
                    .ul-text { color:#61A5AA;height: 213px !important;}
                    .header { height: 131px; padding: 4px 0;}
                    .features {height: 284px;}
					.title {padding-top: 10px;}
                </style>
    </body>
</html>
