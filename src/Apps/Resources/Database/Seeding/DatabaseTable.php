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
     *
     * @var array
     */
    protected $seeders = [
        'UserTable',
        'RoleTable',
    ];

    /**
     * Run all seeders to seed database
     *
     * Example Command:
     * <code>
     *
     * php cygnite database:seed
     *
     * </code>
     *
     * Run only particular seeder
     *
     * Example Command:
     * <code>
     *
     * php cygnite database:seed UserTable,RoleTable
     *
     * </code>
     *
     * We will run all seeder class to seed database table
     */
    public function run()
    {
        $this->execute();
    }
}
