<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('view_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->unsignedBigInteger('article_id')->nullable();
						$table->foreign('article_id')->references('id')->on('articles');
            $table->string("slug");
            $table->string("url", 655);
            $table->string("session_id");
						$table->unsignedBigInteger('user_id')->nullable();
						$table->foreign('user_id')->references('id')->on('users');
            $table->string("ip_address")->nullable();
            $table->string("user_agent")->nullable();
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
        Schema::dropIfExists('view_logs');
    }
}
