<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //

//        factory(App\User::class, 80)->create();
        factory(App\Client::class, 5)->create();
        factory(App\Contact::class, 20)->create()->each(function ($contact) {
            App\Client::all()->random()->contacts()->attach($contact);
        });
        factory(App\Task::class, 5)->create();
        factory(App\BillablePurchaseOrder::class, 20)->create();
        factory(App\NonBillablePurchaseOrder::class, 20)->create();
        // factory(App\Category::class, 8)->create();
        // factory(App\Dispatch::class, 500)->create();
        // factory(App\Item::class, 1000)->create()->each(function ($item) {
        //     App\Dispatch::dispatch()->get()->random()->items()->attach($item);
        // });
    }
}
