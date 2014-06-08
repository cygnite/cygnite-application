<?php
use Cygnite\AssetManager\Asset;
?>

         <div style="margin-left: 79%;margin-bottom: 10px;margin-top: 10px;">
            <?php echo Asset::link('products/type', 'Add Products', array('class' => 'btn btn btn-info')); ?>
        </div>

        <table cellspacing="0" id="dataTable" cellpadding="0" style="width:890px;margin:0px auto;" class="tablesorter data-grid">
            <thead>
                <tr>
                    <th>Sl No.</th>
                    <th>Product Type</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th class="sorter-false">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (count($this->products) > 0) {
                    $i = 1;
                    foreach($this->products as $key => $value) {

                     $row = ($i % 2 == 0) ? 'even' : 'odd';
                ?>
                        <tr class='<?php echo $row; ?>'>
                            <td> <?php echo $i; ?></td>
                            <td><?php echo $value->product_type; ?></td>
                            <td><?php echo $value->name; ?></td>
                            <td><?php echo $value->price; ?></td>
                            <td>
                                <?php
                                echo Asset::link('products/show/'. $value->id, 'View', array('class' => 'btn btn btn-info'));
                                echo Asset::link('products/type/'. $value->id, 'Edit', array('class' => 'btn btn btn-info'));
                                echo Asset::link('products/delete/'. $value->id, 'Delete', array('class' => 'btn btn-danger'));
                                ?>

                            </td>
                        </tr>
                    <?php
                         $i++;
                    }
                   } else  {
                           echo 'No records found !';
                 } ?>
            </tbody>


        </table>

<div ><?php echo $this->links;?> </div>