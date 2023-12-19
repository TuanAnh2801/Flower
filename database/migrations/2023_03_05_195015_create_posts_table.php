<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->json('images')->nullable();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')
            ->on('categoriesPosts')->onDelete('cascade');            
            $table->dateTime('published_at');
            $table->integer('views')->default(0);
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
        Schema::dropIfExists('posts');
    }
}
