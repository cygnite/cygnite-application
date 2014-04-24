<!DOCTYPE html>
<?php
use Cygnite\Helpers\Url;
use Cygnite\Helpers\Assets;

//echo $this->author;
?>

<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>Welcome to Cygnite Framework</title>
<?php echo Assets::addStyle('assets/css/cygnite/style.css'); ?>
<link rel="shortcut icon" href="<?php echo Url::getBase(); ?>assets/img/cygnite/fevicon.png" > </link>
</head>
<body>

<div class="container">
  <div class="header">
     <div style="color: #ECECEC; padding: 31px; ">
         <div align="center" style="font-size: 28px; ">  Welcome To Cygnite Framework </div>
         <div align="center" style=" margin-top: 3px;"><span style="font-size: 16px;">Framework For Web Developers</span></div>
         <div align="center" style=" margin-top: 16px;"><span style="font-size: 16px;">"Discover Cygnite to make your life simple and better."</span> </div>
     </div>
  </div>


  <div class="container-body">

    <hr class="featurette-divider" />

    <div class="container">
                <div class="block features">
                  <h2 class="title-divider"><span><span class="title-em">Core Features OF Cygnite Framework </span></span>
                      <small>Core libraries are rapidly customized and upgrading with new features to full-fill all your needs.</small></h2>

                  <ul class="thumbnails">
                    <li class="span3">
                            <div class="feature-block">
                            <div class="features-head">

                             <h3 class="title"><a href="http://www.cygniteframework.com/p/documentation.html">Better <span class="title-em">Performance</span></a></h3>

                             </div>
                              <p>
                                  Cygnite uses lazy loading extensively which give you better performance than you expected.
                              </p>
                            </div>
                    </li>
                    <li class="span3">
                        <div class="feature-block">
                        <div class="features-head">

                            <h3 class="title">
                                <a href="http://www.cygniteframework.com/p/documentation.html">User  <span class="title-em">Friendly</span></a>
                            </h3>

                         </div>
                      <p>You may be starter or experienced professional you will find very easy to work with Cygnite Framework.
                         It boost your productivity, simplify and minimise your code.
                     </p>
                        </div>
                    </li>

                       <li class="span3">
                           <div class="feature-block">
                            <div class="features-head">

                                 <h3 class="title"><a href="http://www.cygniteframework.com/2013/08/form-builder.html">Inbuilt <span class="title-em">Packages</span></a></h3>
                            </div>

                      <p>
                          Cygnite Framework makes your job much easier with it's core classes such as Form Builder,
                          Active Record, Migration, Schema, Crud generator, Validator, Pretty Exception Handler etc.
                     </p>
                           </div>
                    </li>
                      <div class="clear"> </div>
                    <li class="span3">
                        <div class="feature-block">
                        <div class="features-head">

                            <h3 class="title"><a href="http://www.cygniteframework.com/2013/08/query-builder.html">Multiple <span class="title-em">Databases  </span></a></h3>


                        </div>
                      <p>
                          Connect multiple databases on the fly, generate queries using cygnite ActiveRecord.
                          Your all queries are prepared by proven database abstraction PDO class which prevent
                          sql injection.
                      </p>
                        </div>
                    </li>
                    <li class="span3">
                      <div class="feature-block">
                        <div class="features-head">
                               <h3 class="title"><a href="http://www.cygniteframework.com/2013/08/routing.html">Dynamic <span class="title-em">Routing</span></a></h3>
                        </div>
                        <p> Cygnite framework has powerful routing features which loads you create powerful REST Api also with
                            controller support.
                        </p>
                      </div>
                    </li>


                        <li class="span3">
                            <div class="feature-block">
                               <div class="features-head">

                                   <h3 class="title">
                                       <a href="http://www.cygniteframework.com/p/documentation.html"> Secure <span class="title-em">Applications </span></a>
                                   </h3>

                               </div>
                                  <p> Security is the main concern of any application.
                                      Cygnite keep your session and input string secure with built in mechanism.</p>
                            </div>
                    </li>

                  </ul>

    </div>
  </div>


    <hr class="featurette-divider">

      <div class="clear"> </div>
  <hr class="featurette-divider">

  <div class="footer" >
      <div class="footer-inner-left"> </div>
            <div class="footer-inner" align="center">
                <div class="footerrow tweets" >
                <p style="font-size: 16px;">If you are exploring Cygnite Framework for the first time,
                    you should read the <br><a href="http://www.cygniteframework.com/2013/07/quickstart.html">Quick guide</a> </p>

                <p style="font-size: 18px;">Hope you will enjoy simplicity of Cygnite Framework</p>
            </div>

            <div class="footerrow" align="center" style="clear:both;padding-top: 0px;">
                <div class="footer-hr"></div>

                <?php echo Cygnite\Application::poweredBy(); ?>
            </div>
      </div>
      <div class="footer-inner-right"> </div>
      <div class="clear"> </div>
  </div>

  <!-- ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php echo Assets::addScript('assets/js/cygnite/jquery.js'); ?>
</body>
</html>
