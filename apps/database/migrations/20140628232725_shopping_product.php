<?php 

use Cygnite\Database\Migration;
use Cygnite\Database\Schema;

class ShoppingProduct extends Migration
{
	
	 protected $database = 'cygnite';

	/**
	 * Run the migrations up.
	 *
	 * @return void
	 */
	public function up()
	{
		//Your schema to migrate
		Schema::instance(
        $this,
        function ($table) {
            $table->tableName = 'shopping_product';
            $table->create(
                array(
                    array('name'=> 'id', 'type' => 'int', 'length' => 11,
                        'increment' => true, 'key' => 'primary'),
                    array('name'=> 'name', 'type' => 'string', 'length'  =>'100'),
                    array('name'=> 'description', 'type' => 'string', 'length'  =>'255'),
					array('name'=> 'price', 'type' => 'float', 'length'  =>'10,2'),
                    array(
                        'name'=> 'created_at',
                        'type' => 'datetime',
                        'length'  =>"DEFAULT '0000-00-00 00:00:00'"
                    ),
                    array(
                        'name'=> 'updated_at',
                        'type' => 'datetime',
                        'length'  =>"DEFAULT '0000-00-00 00:00:00'"
                    ),
                ),
                'InnoDB',
                'latin1'
            )->run();
        }
      );        
		
	}

	/**
	 * Revert back your migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 //Roll back your changes done by up method.
		 Schema::instance(
          $this,
          function ($table) {
              $table->tableName = 'shopping_product';
              $table->drop()->run();
          }
       );
	}

}
