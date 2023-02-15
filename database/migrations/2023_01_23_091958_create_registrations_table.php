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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('property_id');
            $table->string('property_code');
            $table->string('serial_number')->nullable();
            $table->string('brand')->nullable();
            $table->string('type')->nullable();
            $table->string('spec')->nullable();
            $table->string('color')->nullable();
            $table->string('refer')->nullable();
            $table->integer('user_id');
            $table->integer('admin_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('registrations');
    }
};
