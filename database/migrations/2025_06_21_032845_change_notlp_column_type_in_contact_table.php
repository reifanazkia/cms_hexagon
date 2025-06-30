<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNotlpColumnTypeInContactTable extends Migration
{
    public function up()
    {
        Schema::table('contact', function (Blueprint $table) {
            $table->string('notlp', 30)->change(); // ubah jadi string
        });
    }

    public function down()
    {
        Schema::table('contact', function (Blueprint $table) {
            $table->integer('notlp')->change(); // revert kalau dibatalkan
        });
    }
}
