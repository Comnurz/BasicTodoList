<?php namespace Bandidaz\Todo\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBandidazTodo extends Migration
{
    public function up()
    {
        Schema::create('bandidaz_todo_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->boolean('status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('bandidaz_todo_');
    }
}
