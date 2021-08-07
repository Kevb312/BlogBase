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
            $table->id();
            $table->foreignId('category_id')->constrained('categories'); //Llave foranea
            //$table->foreignId('comment_id')->constrained('comments'); //Llave foranea
            $table->string('title');
            $table->string('featured');
            $table->longText('descripcion');
            $table->longText('content');
            $table->string('author')->nullable();
            $table->timestamps();


//            $table->unsignedBigInteger('category_id');
  //          $table->foreign('category_id')->references('id')->categories();
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
