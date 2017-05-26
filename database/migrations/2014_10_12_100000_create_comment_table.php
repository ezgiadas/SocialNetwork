<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Comment;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message');
            $table->integer('user_id');
            $table->boolean('is_flagged');
            $table->integer('meme_id');
            $table->timestamps();

        });

        Comment::create([
            'message' => 'Great meme!',
            'user_id' => 2,
            'is_flagged' => true,
            'meme_id' => 3,
        ]);

        Comment::create([
            'message' => 'Awful meme!',
            'user_id' => 4,
            'is_flagged' => false,
            'meme_id' => 7,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
