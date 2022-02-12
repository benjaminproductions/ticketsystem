<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('user_created');
            $table->string('ticket_id');
            $table->string('content');
            $table->softDeletes();
            $table->timestamps();
        });
    }
}
