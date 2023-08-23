<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArtestiqJobopenings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobopenings', function (Blueprint $table) {
            $table->string('quote_title')->nullable()->after('subtitle');
            $table->string('quote_text')->nullable()->after('quote_title');
            $table->mediumText('content2')->nullable()->after('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('jobopenings', ['quote_title', 'quote_text', 'content2']);
    }
}
