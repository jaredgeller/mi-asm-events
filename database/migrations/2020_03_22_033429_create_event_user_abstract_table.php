<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventUserAbstractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_user_abstract', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_user_id');
            $table->string('title', 100);
            $table->string('authors', 200);
            $table->string('body', 3000);
            $table->date('submission_date');
            $table->tinyInteger('delivery_preference');
            $table->timestamps();

            $table->foreign('event_user_id')->references('id')->on('event_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_user_abstract');
    }
}
