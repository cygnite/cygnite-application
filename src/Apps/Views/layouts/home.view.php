<?php
$asset = $view->createAssetCollection('\Apps\Views\Assets\HomeAssetCollection');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="public/assets/img/cygnite/fevicon.png" > </link>

    <title><?php echo $title; ?></title>
    <meta name="keywords" content="CRUD Application" />
    <meta name="author" content="Cygnite Framework Bootstrap Starter Site." />
    <!-- Google will often use this as its description of your page/site. Make it good. -->
    <meta name="description" content="Cygnite CRUD Generator." />
    <!--  Mobile Viewport Fix -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <?php $asset->dump('style');// Header Style block ?>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

<!-- Fluid Container -->
<div class='container'>

    <!-- Content -->
    <?php echo $yield; ?>
    <!-- ./ Content -->

    <!-- Footer -->
    <footer class="clearfix">
        <div style="background: none repeat scroll 0% 0% rgb(21, 112, 166); margin-bottom: 20px; height: 60px;">
            <span style="color: rgb(255, 255, 255); font-weight: bold; margin-left:5%; float: left; padding-top: 22px;">Give some love back. Like, Share, Talk about it ..  </span>
            <span style="float: left; padding-top: 22px; padding-left: 41px;color:#fff;">Facebook </span>
            <span style="float: left;padding-left:8px;">
            <a href="http://www.facebook.com/cygniteframework" target="_blank">
                <img height="64" src="public/assets/img/cygnite/facebook.png" width="64"></a>
            </span>
            <span style="float: left; padding-top: 22px;padding-left:22px;color:#fff;">Twitter</span>
            <span style="float: left;padding-left:8px;">
            <a href="https://twitter.com/cygnitephp" target="_blank">
                <img height="64" src="public/assets/img/cygnite/twitter.png" width="64"></a>
            </span>
            <span style="float: left; padding-top: 22px; padding-left:22px;color:#fff;"> Google+</span>
            <span style="float: left;padding-left:8px;">
            <a href="https://www.google.com/+Cygniteframework" target="_blank">
                <img height="64" src="public/assets/img/cygnite/google.png" width="64">
            </a>
            </span>
            <span style="float: left; padding-top: 22px;padding-left:22px;color:#fff;">Linkedin</span>
            <span style="float: left;padding-left:8px;">
            <a href="http://www.linkedin.com/groups/Cygnite-PHP-Framework-5142503" target="_blank">
                <img height="64" src="public/assets/img/cygnite/linkedin.png" width="64"></a>
            </span>
        </div>


        <div class="footer-outer" style="background: none repeat scroll 0 0 #4A4A4A;height:40px;">

        </div>

        <div align="center" style="height: 51px; background:none repeat scroll 0 0 #3D3D3D;color: #888888; ">
            <div style="padding-top:27px;font-size: 11px;text-transform: uppercase;">
                Released Under The <a href="http://www.opensource.org/licenses/mit-license.php">MIT Public License</a>. Copyrights @2012-2016. Powered by- Sanjoy Dey Productions.
            </div>
        </div>


    </footer>
    <!-- ./ Footer -->

</div>
<!-- ./ Container End -->
<?php
//Script block. Scripts will render here
$asset->dump('script');
?>

<script type="text/javascript">
    $(function () {
        $('#dataGrid').DataTable();
    });
</script>

<style type="text/css">
    .navbar-inverse {background: none repeat scroll 0 0 #07508f!important;}
</style>

</body>
</html>