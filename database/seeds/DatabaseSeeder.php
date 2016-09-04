<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $tables = [
        'users',
        'password_resets',
        'messages',
        'buffets',
        'buffet_packages',
        'halls',
        'hall_bookings',
        'photographers',
        'guest_services',
        'light_services',
        'orders',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->truncateDatabaseTables();
        factory(App\Src\Models\User\User::class,1)->create(['email'=>'admin@test.com','admin'=>1]);
        factory(App\Src\Models\Message::class,5)->create();
        factory(App\Src\Models\Buffet::class,3)->create();
        factory(App\Src\Models\BuffetPackage::class,6)->create();
        factory(App\Src\Models\Hall::class,2)->create();
        factory(App\Src\Models\Photographer::class,4)->create();
        factory(App\Src\Models\GuestService::class,4)->create();
        factory(App\Src\Models\LightService::class,4)->create();
        factory(App\Src\Models\Order::class,10)->create();
        Model::reguard();

    }

    private function truncateDatabaseTables()
    {
        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }
    }

}
