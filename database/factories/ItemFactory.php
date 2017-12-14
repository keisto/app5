<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    $category_id = App\Category::active()->get()->random()->id;
    $asset_id = 0;
    $ref_id = 0;
    switch ($category_id) {
        case 1:
            $asset_id = App\Asset::active()->employee()->get()->random()->id;
            $ref_id = App\User::active()->employee()->get()->random()->id;
            break;
        case 2:
            $asset_id = App\Asset::active()->truck()->get()->random()->id;
            $ref_id = App\Truck::active()->get()->random()->id;
            break;
        case 3:
            $asset_id = App\Asset::active()->trailer()->get()->random()->id;
            $ref_id = App\Trailer::active()->get()->random()->id;
            break;
        case 4:
            $asset_id = App\Asset::active()->equipment()->get()->random()->id;
            $ref_id = App\Equipment::active()->get()->random()->id;
            break;
        case 5:
            // $asset_id = App\Asset::active()->truck()->get()->random()->id;
            // $ref_id = App\Truck::active()->get()->random()->id;
            break;
        case 6:
            // $asset_id = App\Asset::active()->truck()->get()->random()->id;
            // $ref_id = App\Truck::active()->get()->random()->id;
            break;
        case 7:
            // $asset_id = App\Asset::active()->truck()->get()->random()->id;
            // $ref_id = App\Truck::active()->get()->random()->id;
            break;
        case 8:
            // $asset_id = App\Asset::active()->truck()->get()->random()->id;
            // $ref_id = App\BillablePurchaseOrder::open()->get()->random()->id;
            break;
    }
    return [
        'asset_id' => $asset_id,
        'category_id' => $category_id,
        'ref_id' => $ref_id,
    ];
});
