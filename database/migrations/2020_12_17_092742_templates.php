<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Templates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function(Blueprint $table) {
            $table->id();
            $table->integer('templates_id')->unique();
            $table->string('templates_name', 50);
            $table->string('templates_description');
            $table->integer('templates_price');
            $table->string('templates_status', 12);
            $table->string('templates_author', 20);
            $table->string('templates_files');
            $table->string('templates_thumbnail');
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
        Schema::dropIfExists();
    }
}
