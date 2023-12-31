<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_coupons', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('code', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->decimal('value', 11, 2)->nullable();
            $table->string('start_date', 255)->nullable();
            $table->string('end_date', 255)->nullable();
            $table->decimal('minimum_spend', 11, 2)->nullable();
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
        Schema::dropIfExists('user_coupons');
    }
}
