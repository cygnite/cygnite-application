<?php
namespace Apps\Resources\Database\Seeding;

use Cygnite\Database\Table\Seeder;

/**
 * Class DatabaseTable
 *
 * @package Apps\Resources\Database\Seeding
 */
class DatabaseTable extends Seeder
{
    /**
     * Specify all seeder class namespace here
     * Seeder will seed data into corresponding database table.
     * @var array
     */
    protected $seeders = [
        'Apps\Resources\Database\Seeding\UserTable',
    ];

    /**
     * We will run all seeder class to seed database table
     */
    public function run()
    {
        $this->execute();
    }
}
