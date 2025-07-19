<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('internship_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('name');
            $table->string('gender')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('position');
            $table->text('why')->nullable();
            $table->string('skills')->nullable();
            $table->string('internship_name')->default('Summer Internship');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('internship_registrations');
    }
};