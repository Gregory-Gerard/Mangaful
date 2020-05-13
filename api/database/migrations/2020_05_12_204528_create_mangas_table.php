<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMangasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mangas', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150)->index();
            $table->bigInteger('author_id')->index()->nullable();
            $table->string('cover', 60)->nullable();
            $table->string('banner', 60)->nullable();
            $table->text('description')->nullable();
            $table->string('status', 15)->nullable();
            $table->boolean('is_webcomic')->default(0);
            $table->string('scrapping_url', 200);
            $table->date('release')->nullable();
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
        Schema::dropIfExists('mangas');
    }
}
