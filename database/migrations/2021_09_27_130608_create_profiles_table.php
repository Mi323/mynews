<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('名前(name)'); // プロフィールの名前を保存するカラム
            $table->string('性別(gender)');  // プロフィールの性別を保存するカラム
            $table->string('趣味(hobby)');  // プロフィールの趣味を保存するカラム
            $table->string('自己紹介(introduction)'); // プロフィールの自己紹介を保存するカラム
            
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
        Schema::dropIfExists('profiles');
    }
}
