<?php 

use Cygnite\Database\Migration;
use Cygnite\Database\Schema;

class CreateUsersConsoleTable extends Migration
{

   // private $tableName = 'users_console';
	/**
	 * Run the migrations up.
	 *
	 * @return void
	 */
	public function up()
	{
		//Your schema to migrate
        Schema::getInstance(
            $this,
            function ($table) {
              //$table->tableName = 'users_console';

                $table->create(
                    array(
                        array('name'=> 'id', 'type' => 'int', 'length' => 11,
                            'increment' => true, 'key' => 'primary'),
                        array('name'=> 'depth', 'type' => 'float', 'length'  =>'10,2'),
                        array('name'=> 'rise', 'type' => 'time'),
                        array('name'=> 'time', 'type' => 'timestamp',
                            'length'=> "DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"
                        ),
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

        Schema::getInstance(
            $this,
            function ($table) {
                $table->drop()->run();
            }
        );
    }

}
