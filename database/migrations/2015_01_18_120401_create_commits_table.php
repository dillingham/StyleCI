<?php

/*
 * This file is part of StyleCI.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 * (c) Joseph Cohen <joseph.cohen@dinkbit.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * This is the create commits table migration class.
 *
 * @author Graham Campbell <graham@mineuk.com>
 */
class CreateCommitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commits', function (Blueprint $table) {
            $table->char('id', 40)->primary();
            $table->bigInteger('repo_id')->unsigned()->index();
            $table->bigInteger('fork_id')->unsigned()->nullable();
            $table->string('ref', 128);
            $table->string('message', 128);
            $table->tinyInteger('status')->unsigned()->default(0);
            $table->float('time');
            $table->float('memory');
            $table->longText('diff');
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
        Schema::drop('commits');
    }
}
