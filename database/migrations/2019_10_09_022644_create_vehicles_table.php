<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('company_id');
            $table->unsignedbigInteger('user_id');
            $table->unsignedbigInteger('vehicle_cat_id');
            $table->string('image');
            $table->string('vehicle_name');
            $table->text('vehicle_model');
            $table->text('vehicle_status');
            $table->integer('price');
            $table->integer('quantity_available');
            $table->integer('use_count')->default(0);
            $table->string('plate_no');
            $table->integer('capacity');
            $table->string('unit');
            $table->unsignedbigInteger('route_cat_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('route_cat_id')->references('id')->on('route_categories')->onDelete('cascade');
            $table->foreign('vehicle_cat_id')->references('id')->on('vehicle_categories')->onDelete('cascade');
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
        Schema::dropIfExists('vehicles');
    }
}
