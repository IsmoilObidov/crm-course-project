<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_data', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->string('adress');
            $table->string('number');
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('bill');
            $table->date('finish_billing');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_data');
    }
};
