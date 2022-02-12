<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttachmentsTable extends Migration
{
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('user_created');
            $table->string('ticket_id')->nullable();
            $table->string('comment_id')->nullable();
            $table->string('path');
            $table->softDeletes();
            $table->timestamps();
        });
    }
}
