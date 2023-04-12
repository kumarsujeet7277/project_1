<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->tinyInt('assignee_code')->unique();
            $table->char('name', 100);
            $table->bigInt('mobile')->unique()->nullable();
            $table->string('email')->unique()->nullable();

            $table->string('password');
            $table->string('password_confirmation');
            $table->binary('image');
            $table->enum('role', ['Clerk','Manager','Supervisor','Devloper','Other'])->default('Other');
            $table->boolean('check');
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
        Schema::dropIfExists('members');
    }
};
