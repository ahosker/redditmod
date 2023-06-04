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

        if (1 == 2) {
            Schema::create('reddit_auth_subreddit', function (Blueprint $table) {
                $table->id();

                $table->integer('reddit_auth_id', 80)->nullable(false)->foreign('reddit_auth_id')->references('id')->on('reddit_auths');
                $table->integer('subreddit_id', 80)->nullable(false)->foreign('subreddit_id')->references('id')->on('subreddits');

                $table->timestamps();
            });
        }

        Schema::create('subreddits', function (Blueprint $table) {
            $table->id();
            $table->string('display_name', 80)->nullable();
            $table->string('description', 500)->nullable();
            $table->string('title', 80)->nullable();
            $table->string('created', 80)->nullable();
            $table->string('subreddit_id', 80)->nullable(false);
            $table->string('header_title', 80)->nullable();
            $table->string('url', 80)->nullable();
            $table->timestamps();
        });

        Schema::create('reddit_auth_subreddits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reddit_auth_id');
            $table->unsignedBigInteger('subreddits_id');
            $table->timestamps();

            $table->foreign('reddit_auth_id')->references('id')->on('reddit_auths');
            $table->foreign('subreddits_id')->references('id')->on('subreddits');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reddit_auth_subreddit');
        Schema::dropIfExists('subreddits');
    }
};
