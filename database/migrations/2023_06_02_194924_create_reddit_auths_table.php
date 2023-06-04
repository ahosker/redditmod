<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reddit_auths', function (Blueprint $table) {
            $table->id();
            //Relationship to users
            //$table->unsignedBigInteger('user_id')->nullable(false)->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable(false)->foreign('user_id')->references('id')->on('users');
            //Main content
            //tokenb but a longstring
            $table->longText('token')->nullable(false);
            $table->string('scope', 100)->nullable();
            //Timestamps
            $table->timestamps();
        });

        Schema::create('reddit_auth_refresh_tokens', function (Blueprint $table) {
            $table->id();
            //Relationship to users
            $table->unsignedBigInteger('user_id')->nullable(false)->foreign('user_id')->references('id')->on('users');
            //Relationship to reddit_auths
            $table->string('reddit_auth_id', 80)->nullable(false)->foreign('reddit_auth_id')->references('id')->on('reddit_auths');
            //Main content
            $table->longText('refresh_token');
            $table->timestamp('expires')->nullable(false);
            //Timestamps
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reddit_auths');
        Schema::dropIfExists('reddit_auth_refresh_tokens');
    }
};
