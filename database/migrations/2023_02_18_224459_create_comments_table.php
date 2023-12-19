<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            // $table->increments('id');
            // $table->text('content');
            // $table->integer('user_id')->unsigned()->nullable();
            // $table->integer('product_id')->unsigned()->nullable();
            // $table->foreign('user_id')->references('id')
            // ->on('users')->onDelete('cascade');
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            // $table->timestamps();
            $table->increments('id');
            $table->text('content');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
            // $table->dropColumn('is_new');
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');

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
        Schema::dropIfExists('comments');
        // Schema::table('comments', function (Blueprint $table) {
        //     $table->dropColumn('is_new');
        // });
    }
}
