<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\MemeUserVote;

class CreateMemeUserVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meme_user_votes', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('meme_id');
            $table->integer('vote');
            $table->timestamps();
        });

        MemeUserVote::create([
            'user_id' => 1,
            'meme_id' => 3,
            'vote' => 1,
            ]);

        MemeUserVote::create([
            'user_id' => 2,
            'meme_id' => 7,
            'vote' => 0,
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meme_user_votes');
    }
}
