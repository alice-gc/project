<?php

use App\Models\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;

return new class extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::disableForeignKeyConstraints();
        // TODO - column names - avoid tautologies!
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');

            $table->string('categoryName'); //foreignIdFor(Event::class)->string('categoryName');
            $table->string('categoryColor');

            // TODO - datetime / time type
            $table->string('categoryStartTime');
            $table->string('categoryEndTime');

            $table->smallInteger('order')->default(0);
            $table->unsignedInteger('timetable_id');

            $table->foreign('timetable_id')
                ->references('id')
                ->on('timetables')
                ->onDelete('cascade');

            $table->unsignedInteger('user_id');


            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');


            $table->timestamps();
        });

        Schema::create('category_user', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Category::class);


        });
    // Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('category_user');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
