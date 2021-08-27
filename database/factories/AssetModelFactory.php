<?php

/*
|--------------------------------------------------------------------------
| Asset Model Factories
|--------------------------------------------------------------------------
|
| Factories related exclusively to creating models ..
|
*/

/*
|--------------------------------------------------------------------------
| Laptops
|--------------------------------------------------------------------------
*/
$factory->define(App\Models\AssetModel::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'model_number' => $faker->creditCardNumber(),
        'notes' => 'Created by demo seeder',

    ];
});


// 1
$factory->state(App\Models\AssetModel::class, 'mbp-13-model', function ($faker) {
    return [
        'name' => 'Macbook Pro 13"',
        
        
        'eol' => '36',
        'depreciation_id' => 1,
        'image' => 'mbp.jpg',
        'fieldset_id' => 2,
    ];
});

// 2
$factory->state(App\Models\AssetModel::class, 'mbp-air-model', function ($faker) {
    return [
        'name' => 'Macbook Air',
        
        
        'eol' => '36',
        'depreciation_id' => 1,
        'image' => 'macbookair.jpg',
        'fieldset_id' => 2,
    ];
});

// 3
$factory->state(App\Models\AssetModel::class, 'surface-model', function ($faker) {
    return [
        'name' => 'Surface',
        
        
        'eol' => '36',
        'depreciation_id' => 1,
        'image' => 'surface.jpg',
        'fieldset_id' => 2,
    ];
});

// 4
$factory->state(App\Models\AssetModel::class, 'xps13-model', function ($faker) {
    return [
        'name' => 'XPS 13',
        
        
        'eol' => '36',
        'depreciation_id' => 1,
        'image' => 'xps.jpg',
        'fieldset_id' => 2,
    ];
});

// 5
$factory->state(App\Models\AssetModel::class, 'zenbook-model', function ($faker) {
    return [
        'name' => 'ZenBook UX310',
        
        
        'eol' => '36',
        'depreciation_id' => 1,
        'image' => 'zenbook.jpg',
        'fieldset_id' => 2,
    ];
});

// 6
$factory->state(App\Models\AssetModel::class, 'spectre-model', function ($faker) {
    return [
        'name' => 'Spectre',
        
        
        'eol' => '36',
        'depreciation_id' => 1,
        'image' => 'spectre.jpg',
        'fieldset_id' => 2,
    ];
});

// 7
$factory->state(App\Models\AssetModel::class, 'yoga-model', function ($faker) {
    return [
        'name' => 'Yoga 910',
        
        
        'eol' => '36',
        'depreciation_id' => 1,
        'image' => 'yoga.png',
        'fieldset_id' => 2,
    ];
});

/*
|--------------------------------------------------------------------------
| Desktops
|--------------------------------------------------------------------------
*/


$factory->state(App\Models\AssetModel::class, 'macpro-model', function ($faker) {
    return [
        'name' => 'iMac Pro',
        
        
        'eol' => '24',
        'depreciation_id' => 1,
        'image' => 'imacpro.jpg',
        'fieldset_id' => 2,
    ];
});

$factory->state(App\Models\AssetModel::class, 'lenovo-i5-model', function ($faker) {
    return [
        'name' => 'Lenovo Intel Core i5',
        
        
        'eol' => '24',
        'depreciation_id' => 1,
        'image' => 'lenovoi5.png',
        'fieldset_id' => 2,
    ];
});

$factory->state(App\Models\AssetModel::class, 'optiplex-model', function ($faker) {
    return [
        'name' => 'OptiPlex',
        
        
        'model_number' => '5040 (MRR81)',
        'eol' => '24',
        'depreciation_id' => 1,
        'image' => 'optiplex.jpg',
        'fieldset_id' => 2,
    ];
});


/*
|--------------------------------------------------------------------------
| Conference Phones
|--------------------------------------------------------------------------
*/


$factory->state(App\Models\AssetModel::class, 'polycom-model', function ($faker) {
    return [
        'name' => 'SoundStation 2',
        
        
        'eol' => '12',
        'depreciation_id' => 1,
        'image' => 'soundstation.jpg',
    ];
});

$factory->state(App\Models\AssetModel::class, 'polycomcx-model', function ($faker) {
    return [
        'name' => 'Polycom CX3000 IP Conference Phone',
        
        
        'eol' => '12',
        'depreciation_id' => 1,
        'image' => 'cx3000.png',
    ];
});


/*
|--------------------------------------------------------------------------
| Tablets
|--------------------------------------------------------------------------
*/

$factory->state(App\Models\AssetModel::class, 'ipad-model', function ($faker) {
    return [
        'name' => 'iPad Pro',
        
        
        'eol' => '12',
        'depreciation_id' => 1,
        'image' => 'ipad.jpg',
    ];
});


$factory->state(App\Models\AssetModel::class, 'tab3-model', function ($faker) {
    return [
        'name' => 'Tab3',
        
        
        'eol' => '12',
        'depreciation_id' => 1,
        'image' => 'tab3.png',
    ];
});


/*
|--------------------------------------------------------------------------
| Mobile Phones
|--------------------------------------------------------------------------
*/

$factory->state(App\Models\AssetModel::class, 'iphone6s-model', function ($faker) {
    return [
        'name' => 'iPhone 6s',
        
        
        'eol' => '12',
        'depreciation_id' => 3,
        'image' => 'iphone6.jpg',
        'fieldset_id' => 1,
    ];
});

$factory->state(App\Models\AssetModel::class, 'iphone7-model', function ($faker) {
    return [
        'name' => 'iPhone 7',
        
        
        'eol' => '12',
        'depreciation_id' => 1,
        'image' => 'iphone7.jpg',
        'fieldset_id' => 1,
    ];
});

/*
|--------------------------------------------------------------------------
| Displays
|--------------------------------------------------------------------------
*/

$factory->state(App\Models\AssetModel::class, 'ultrafine', function ($faker) {
    return [
        'name' => 'Ultrafine 4k',
        
        
        'eol' => '12',
        'depreciation_id' => 2,
        'image' => 'ultrafine.jpg',
    ];
});

$factory->state(App\Models\AssetModel::class, 'ultrasharp', function ($faker) {
    return [
        'name' => 'Ultrasharp U2415',
        
        
        'eol' => '12',
        'depreciation_id' => 2,
        'image' => 'ultrasharp.jpg',
    ];
});






