<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('profile_id');

            $table->text('body') ;
            // $table->string('media_url') ;
            $table->unsignedBigInteger('likes')->default(0);
            $table->unsignedBigInteger('retweets')->default(0);
            $table->unsignedBigInteger('replies')->default(0);

            $table->timestamps();
            $table->index('profile_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
}
