<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIqTestsTableMigration extends Migration
{
    public function up()
    {
        Schema::create('iq_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('position', false, true);
            $table->softDeletes();

            $table->foreign('parent_id')
                ->references('id')
                ->on('iq_tests')
                ->onDelete('set null');
            $table->string('title');
            $table->integer('status')->nullable();
            $table->timestamps();
        });

        Schema::create('iq_test_closure', function (Blueprint $table) {
            $table->increments('closure_id');

            $table->integer('ancestor', false, true);
            $table->integer('descendant', false, true);
            $table->integer('depth', false, true);

            $table->foreign('ancestor')
                ->references('id')
                ->on('iq_tests')
                ->onDelete('cascade');

            $table->foreign('descendant')
                ->references('id')
                ->on('iq_tests')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('iq_test_closure');
        Schema::dropIfExists('iq_tests');
    }
}
