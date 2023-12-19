<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->bigInteger('total_price');
            $table->dateTime('buy_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('full_name');
            $table->string('telephone');
            $table->string('email');
            $table->timestamps();
            $table->integer('campaign_id')->nullable()->unsigned();
            $table->foreign('campaign_id')->references('id')
            ->on('campaign')->onDelete('cascade');
            $table->foreign('order_id')->references('id')
            ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
