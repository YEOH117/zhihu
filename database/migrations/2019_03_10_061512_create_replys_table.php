<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replys', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('comment_id');
            $table->unsignedInteger('reply_id')->nullable($value = true);
            $table->string('reply_type',50);
            $table->text('content');
            $table->unsignedInteger('from_uid');
            $table->unsignedInteger('to_uid');
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
        Schema::dropIfExists('replys');
    }
}
