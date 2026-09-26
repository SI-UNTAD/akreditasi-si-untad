<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$criteria = \App\Models\Criteria::all();
foreach($criteria as $c) {
    echo $c->id . ' | ' . $c->number . ' | ' . $c->name . PHP_EOL;
}