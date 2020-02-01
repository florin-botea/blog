<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug', '511');
						$table->unsignedBigInteger('user_id')->nullable();
						$table->foreign('user_id')->references('id')->on('users');
            $table->string('title', 511);
            $table->string('photo');
            $table->string('description', 511);
            $table->text('sample');
            $table->mediumText('content');
						$table->unsignedBigInteger('category_id')->nullable();
						$table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('articles');
    }
}
