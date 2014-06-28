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
                <div style="background: #F2F2F2;color: #484848; padding: 5px; ">
                    <div align="center" > <h3 class="text-center" > <strong style="font-weight: bolder; font-size: 40px;"> Welcome </strong> to Cygnite Framework </h3>
                        <span style="font-size: 15px;">A modern PHP Framework for Web developers</span>

                    </div>


                </div>
            </div>

            <div class="container-body">

                <div class="container">
                    <div align="center">
                        <h2 class="text-center">Why you'll love Cygnite Framework.</h2>
                        <hr class="featurette-divider"></hr>
                    </div>
                    <p class="lead" style="font-family: small-caption;font-size: 25px;padding-left: 11px;">
                        Cygnite packed with various awesome features to make your development very simple and enjoyable.
                        You may be beginner or advance professional, Cygnite welcome you all way.</p>

                    <hr class="featurette-divider"></hr>


                    <ul class="thumbnails">
                        <li class="span3">
                            <div class="feature-block">
                                <div class="features-head">
                                    <h3 class="title">
                                        <a href="http://www.cygniteframework.com/2013/07/introduction.html">Better <span class="title-em">Performance</span></a></h3>
                                </div>
                                <p> With better performance and inbuilt caching library makes your applications faster then you are expecting. </p>
                            </div>
                        </li>
                        <li class="span3">
                            <div class="feature-block">
                                <div class="features-head">
                                    <h3 class="title">
                                        <a href="http://www.cygniteframework.com/2013/08/controllers.html">User  <span class="title-em">Friendly</span></a></h3>
                                </div>
                                <p> You may be starter or experienced php professional you will find very easy to work with Cygnite framework.
                                    Its very easy to use, almost zero configuration. </p>
                            </div>
                        </li>

                        <li class="span3">
                            <div class="feature-block">
                                <div class="features-head">
                                    <h3 class="title">
                                        <a href="http://www.cygniteframework.com/2013/07/quickstart.html">Composer  <span class="title-em">Powered</span></a></h3>
                                </div>
                                <p> You may be starter or experienced php professional you will find very easy to work with Cygnite framework.
                                    Its very easy to use, almost zero configuration. </p>
                            </div>
                        </li>
                    </ul>


                    <div class="block features">
                        <p> <h3 style="color:#0D73AE !important;padding-left: 11px;">Cygnite framework Is Best for You if..</h3> </p>
                        <div class="feature-block" style="width:38%;">
                            <ul class="ul-text">
                                <li> You need an <strong> lightweight</strong> framework</li>
                                <li> You need exceptional <strong>performance</strong></li>
                                <li> You want to develop application on <strong>deadline</strong></li>
                                <li>You like <strong>simple, easy to use,</strong> and <strong>well documented</strong> framework. </li>
                            </ul>
                        </div>
                        <div class="feature-block"  style="padding: 22px;"> </div>

                        <div class="feature-block"  style="width:56%;">
                            <ul class="ul-text" >
                                <li> Don't want to spend lot of time on <strong>configuring</strong> things</li>
                                <li> You need a framework to plugin <strong>third party</strong> libraries.</li>
                                <li> You don't want to spend lot of time on writing <strong>crud operation</strong></li>
                                <li>You are not interested on adding <strong>large scale</strong> libraries into your application </li>
                            </ul>
                        </div>
                        <hr class="featurette-divider"></hr>

                    </div>

                </div>

                <style>

                    .feature-block{ float: left;border:0px; font-size: 17px;font-family: small-caption;}
                    .feature-block:hover{box-shadow:none;}
                    .ul-text { color:#61A5AA;height: 213px !important;}
                    .header { height: 131px; padding: 4px 0;}
                    .features {height: 284px;}
                </style>


            </div>




            <hr class="featurette-divider">

            <div class="clear"> </div>
            <hr class="featurette-divider">

            <div class="footer" >
                <div class="footer-inner-left"> </div>
                <div class="footer-inner" align="center">
                    <div class="footerrow tweets" >
                        <p style="font-size: 16px;">If you are exploring Cygnite framework for the first time,
                            you should read the <br><a href="http://www.cygniteframework.com/2013/07/quickstart.html">Quick guide</a> </p>

                        <p style="font-size: 18px;">Hope you will enjoy simplicity of Cygnite framework</p>
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
    </body>
</html>
