<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Artisan::call('db:seed', [
            '--class' => 'DatabaseSeeder',
            '--force' => true
        ]);
    }

    public function down()
    {
        DB::table('customers')->delete();
    }
};
