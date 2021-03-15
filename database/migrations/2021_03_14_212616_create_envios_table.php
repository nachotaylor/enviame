<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envios', function (Blueprint $table) {
            $table->id();
            $table->integer('shipment_id');
            $table->string('imported_id');
            $table->string('tracking_number');
            $table->integer('status_id');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('shipping_address');
            $table->string('shipping_place');
            $table->string('shipping_country');
            $table->string('carrier');
            $table->string('service');
            $table->string('barcodes')->nullable();
            $table->string('deadline_at')->nullable();
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
        Schema::dropIfExists('envios');
    }
}
