<?php
namespace Apps\Resources\Database\Seeding;

use Cygnite\Database\Migration;
use Cygnite\Database\Table\Schema;
use Cygnite\Database\Table\Seeder;

/**
 * Class UserTable
 *
 * @package Apps\Resources\Database\Seeding
 */
class UserTable extends Migration
{
    public function execute()
    {
        $data = [
            'name' => '',
            'description' => '',
            'meta' => '',
            'created_by' => '',
        ];
        show($data);
        //$this->insert('user', $data);
    }
}
