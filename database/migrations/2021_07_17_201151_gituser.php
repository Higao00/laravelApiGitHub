<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Gituser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gitusers', function (Blueprint $table) {
            $table->id();
            $table->string('login')->nullable();
            $table->string('idGit')->nullable();
            $table->string('node_id')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('gravatar_id')->nullable();
            $table->string('url')->nullable();
            $table->string('html_url')->nullable();
            $table->string('followers_url')->nullable();
            $table->string('following_url')->nullable();
            $table->string('gists_url')->nullable();
            $table->string('starred_url')->nullable();
            $table->string('subscriptions_url')->nullable();
            $table->string('organizations_url')->nullable();
            $table->string('repos_url')->nullable();
            $table->string('events_url')->nullable();
            $table->string('received_events_url')->nullable();
            $table->string('type')->nullable();
            $table->string('site_admin')->nullable();
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->string('blog')->nullable();
            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->string('hireable')->nullable();
            $table->string('bio')->nullable();
            $table->string('twitter_username')->nullable();
            $table->string('public_repos')->nullable();
            $table->string('public_gists')->nullable();
            $table->string('followers')->nullable();
            $table->string('following')->nullable();
            $table->string('git_created_at')->nullable();
            $table->string('git_updated_at')->nullable();
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
        Schema::dropIfExists('gitusers');
    }
}
