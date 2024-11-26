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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->after('remember_token')->nullable();
            $table->string('address')->after('phone')->nullable();
            $table->string('twitter_link')->after('address')->nullable();
            $table->string('facebook_link')->after('twitter_link')->nullable();
            $table->string('insta_link')->after('facebook_link')->nullable();
            $table->string('github_link')->after('insta_link')->nullable();
            $table->string('image')->after('github_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('twitter_link');
            $table->dropColumn('facebook_link');
            $table->dropColumn('insta_link');
            $table->dropColumn('github_link');
            $table->dropColumn('image');
        });
    }
};
