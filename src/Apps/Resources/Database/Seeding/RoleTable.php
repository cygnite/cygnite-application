<?php
namespace Apps\Resources\Database\Seeding;

use Cygnite\Database\Migration;
/**
 * Class UserTable
 *
 * @package Apps\Resources\Database\Seeding
 */
class RoleTable extends Migration
{
    public function execute()
    {
        $data = [
            'role_name' => '',
            'role_description' => '',
            'role_meta' => '',
            'created_by' => '',
        ];

        $this->insert('user', $data);
    }
}
