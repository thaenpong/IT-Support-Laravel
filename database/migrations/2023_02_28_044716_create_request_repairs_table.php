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
            $table->int('emp_id');
            $table->int('regis_id');
            $table->string('emp_behave');
            $table->int('admin_id');
            $table->string('admin_behave');
            $table->timestamps();
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
