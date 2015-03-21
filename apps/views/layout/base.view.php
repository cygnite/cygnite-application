<?php
use Cygnite\Mvc\View\Widget;
use Cygnite\AssetManager\Asset;
use Cygnite\Common\UrlManager\Url;
use Cygnite\Foundation\Application;
use Cygnite\AssetManager\AssetCollection;

$asset = AssetCollection::make(function ($asset)
{
    $asset->where('header')
        ->add('style', array('path' => 'jquery.dataTables.css'))
        ->add('style', array('path' => 'assets/css/bootstrap/css/bootstrap.min.css'))
        ->add('style', array('path' => 'assets/css/bootstrap/css/bootstrap-theme.min.css'))
        ->add('style', array('path' => 'assets/css/cygnite/bootstrap/datatables-bootstrap.css'));

    $asset->where('footer')
        ->add('style', array('path' => 'assets/css/cygnite/flash.css'))
        ->add('style', array('path' => 'assets/css/cygnite/wysihtml5/prettify.css'))
        ->add('style', array('path' => 'assets/css/cygnite/wysihtml5/bootstrap-wysihtml5.css'));

    $asset->where('footer')
        ->add('script', array('path' => 'assets/js/cygnite/jquery/1.10.1/jquery.min.js'))
        ->add('script', array('path' => 'assets/js/twitter/bootstrap/js/bootstrap.min.js'))
        ->add('script', array('path' => 'assets/js/dataTables/jquery.dataTables.min.js'))
        ->add('script', array('path' => 'assets/js/dataTables/datatables-bootstrap.js'))
        ->add('script', array('path' => 'assets/js/dataTables/datatables.fnReloadAjax.js'))
        ->add('script', array('path' => 'assets/js/dataTables/prettify.js'));

    return $asset;
});
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $this->title; ?></title>
        <?php $asset->where('header')->dump('style');// Header Style block ?>
    </head>
    <body>

    <!-- Fluid Container -->
    <div class='container'>

        <!-- Navbar -->
        <?php Widget::make('layout::widget::navbar'); ?>
        <!-- ./ Navbar -->

        <!-- Content -->
        <?php echo $yield; ?>
        <!-- ./ Content -->

        <!-- Footer -->
        <footer class="clearfix"></footer>
        <!-- ./ Footer -->

    </div>
    <!-- ./ Container End -->
<?php
// Footer Style block
$asset->where('footer')->dump('style');
//Script block. Scripts will render here
$asset->where('footer')->dump('script');
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