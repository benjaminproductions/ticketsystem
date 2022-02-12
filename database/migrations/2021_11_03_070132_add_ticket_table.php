<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTicketTable extends Migration
{
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->id();
            $table->string('user_created');
            $table->string('title');
            $table->string('content');
            $table->string('priority');
            $table->softDeletes();
            $table->timestamps();
        });
    }
}
