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
        Schema::create('pupil_data', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->integer('group_id')->nullable();
            $table->string('last_name', 30)->nullable();
            $table->string('first_name', 30)->nullable();
            $table->date('birth_date');
            $table->string('address', 100);
            $table->string('phone', 50);
            $table->string('father_name', 30)->nullable();
            $table->string('father_phone', 50)->nullable();
            $table->string('mother_name', 30)->nullable();
            $table->string('mother_phone', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pupil_data');
    }
};
