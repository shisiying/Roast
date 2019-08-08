<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCafesUsersTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cafes_users_tags', function (Blueprint $table) {
            $table->increments('cafe_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->primary(['cafe_id', 'user_id', 'tag_id'], 'cafes_users_tags_primary');
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
        Schema::dropIfExists('cafes_users_tags');
    }
}
