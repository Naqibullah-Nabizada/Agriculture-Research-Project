<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researchers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('father_name');
            $table->string('kankor_id');
            $table->foreignId('class_id')->constrained('classes')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('faculty_id')->constrained('faculties')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('department_id')->constrained('departments')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('area');
            $table->string('project_title');
            $table->date('start_of_project');
            $table->date('end_of_project');
            $table->string('length');
            $table->string('width');
            $table->string('plots');
            $table->string('treatments');
            $table->tinyInteger('duplicate');
            $table->string('photo');
            $table->string('soft');
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
        Schema::dropIfExists('researchers');
    }
};
