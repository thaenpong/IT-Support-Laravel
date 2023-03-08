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
        Schema::create('request_repairs', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_id');
            $table->integer('number');
            $table->integer('regis_id');
            $table->string('emp_behave');
            $table->integer('admin_id')->nullable();
            $table->dateTime('admin_date')->nullable();
            $table->dateTime('admin_date_finish')->nullable();
            $table->string('st_be')->nullable();
            $table->string('st_af')->nullable();
            $table->string('admin_behave')->nullable();
            $table->string('st')->nullable();
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
        Schema::dropIfExists('request_repairs');
    }
};
