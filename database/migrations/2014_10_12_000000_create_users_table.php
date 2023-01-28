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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('member');
            $table->string('gender')->nullable();
            $table->string('martial')->nullable();
            $table->longText('about_me')->nullable();
            $table->longText('looking_for')->nullable();
            $table->longText('interest_for')->nullable();
            $table->string('smoking')->nullable();
            $table->string('drinking')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('eye_color')->nullable();
            $table->integer('age')->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->default('default.jpg');
            $table->bigInteger('messages_left')->default(10);
            $table->rememberToken();
            $table->date('birth_at')->nullable();
            $table->timestamp('last_reward_at')->nullable();
            $table->timestamp('last_seen')->nullable();
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
        Schema::dropIfExists('users');
    }
};
