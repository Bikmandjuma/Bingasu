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
        Schema::create('admin_social_media', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('whatsapp');
            $table->string('twitter');
            $table->string('linkdin');
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
        Schema::dropIfExists('social_media');
    }
};
