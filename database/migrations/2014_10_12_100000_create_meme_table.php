<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Meme;

class CreateMemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memes', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_flagged');
            $table->string('upvotes');
            $table->string('downvotes');
            $table->string('image_url');
            $table->string('title');
            $table->integer('user_id');
            $table->integer('group_id');
            $table->timestamps();

            });




        Meme::create([
            'is_flagged' => true,
            'upvotes' => '1',
            'downvotes' => '0',
            'image_url' => 'https://pbs.twimg.com/media/B_HM81VWoAA1O5S.jpg',
            'title' => 'bla',
            'user_id' => 10,
            'group_id' => 9,
        ]);

        Meme::create([

            'is_flagged' => false,
            'upvotes' => '0',
            'downvotes' => '1',
            'image_url' => 'https://lh3.googleusercontent.com/2lV4Nm6oa9_hY2t-9tBbo3RAuEzcraalogZT0oPDmBqic4tWXliMP_PPWMfG4nnr0vxF=h556' ,
            'title' => 'blabla',
            'user_id' => 6,
            'group_id' => 88,

        ]);





    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memes');
    }
}
