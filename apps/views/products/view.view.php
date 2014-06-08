<?php use Cygnite\AssetManager\Asset;?>
    <div style="float:right;margin-right:47px; margin-bottom: 10px;margin-top: 10px;padding-bottom:30px;">
        <?php echo Asset::link('products', 'Back', array('class' => 'btn btn btn-info')); ?>
    </div>

    <div class="form" style="">
        <h2>Showing Product #<?php echo $this->product->id; ?></h2>

        <div class="form-group">
            <div class='form-label control-label'>Name</div>
            <div class="col-sm-10">
                <p class="form-control-static"><span><?php echo $this->product->product_type;?></span></p>
            </div>
        </div>

        <div class="form-group">
            <div class="form-label control-label">Product Name</div>
            <div class="col-sm-10">
                <p class="form-control-static"><span><?php echo $this->product->name;?></span></p>
            </div>
        </div>

        <div class="form-group">
            <div class="form-label control-label">Product Price</div>
            <div class="col-sm-10">
                <p class="form-control-static"><span><?php echo $this->product->price;?> </span></p>
            </div>
        </div>
    </div>