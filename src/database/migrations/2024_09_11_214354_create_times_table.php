<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  // ユーザーID
            $table->date('date');
            $table->time('attend');
            $table->time('leave')->nullable();
            $table->timestamps();

            //ユーザーとの関連付け
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // 勤務日はユニーク（1日1回）
            $table->unique(['user_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('times');
    }
}
