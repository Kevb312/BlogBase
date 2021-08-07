<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('comments', function (Blueprint $table) {
            $table->id()->nullable();
            $table->string('name');
            $table->string('email');
            $table->longText('comment');
            $table->timestamps();
            $table->boolean('enabled')->default(0);
            $table->foreignId('post_id')->constrained('posts'); //Llave foranea


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
        //
    }
}
