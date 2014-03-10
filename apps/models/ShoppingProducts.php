<?php 

namespace Apps\Models;

use Cygnite\Application;
use Cygnite\Helpers\Url;
use Cygnite\Database\Schema;
use Cygnite\Database\ActiveRecord;

class ShoppingProducts extends ActiveRecord
{

    //your database connection name
    protected $database = 'cygnite';

    // your table name here
    //protected $tableName = 'ShoppingProducts';

    protected $primaryKey = 'id';

    public $perPage = 5;

    public function __construct()
    {
        parent::__construct();
    }

    protected function pageLimit()
    {
        return Url::segment(3);
    }
}// End of the ShoppingProducts Model