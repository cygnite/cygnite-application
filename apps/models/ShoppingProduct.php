<?php 

namespace Apps\Models;

use Cygnite\Database\Schema;
use Cygnite\Foundation\Application;
use Cygnite\Common\UrlManager\Url;
use Cygnite\Database\ActiveRecord;

class ShoppingProduct extends ActiveRecord
{

    //your database connection name
    protected $database = 'cygnite';

    // your table name here (Optional)
    //protected $tableName = 'shopping_product';

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