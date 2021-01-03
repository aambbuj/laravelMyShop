<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;
class CreateSimsTable extends Migration
{
    use SoftDeletes;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('c_back_image_id');
            $table->unsignedBigInteger('c_font_image_id');
            $table->unsignedBigInteger('c_sim_or_gd_image_id');
            $table->string('c_swap_phone',12);
            $table->string('c_uid_number',14);
            $table->string('c_name',25);
            $table->string('c_new_sim_no',25);
            $table->string('c_sex',8);
            $table->string('c_dist',20)->nullable();
            $table->string('c_dob',25)->nullable();
            $table->string('c_f_name',20)->nullable();
            $table->string('c_pin',10)->nullable();
            $table->string('c_post',20)->nullable();
            $table->string('c_ps',20)->nullable();
            $table->string('c_state',20)->nullable();
            $table->string('c_village',20)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('c_back_image_id')->references('id')->on('images')->onDelete('cascade');
            $table->foreign('c_font_image_id')->references('id')->on('images')->onDelete('cascade');
            $table->foreign('c_sim_or_gd_image_id')->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sims');
    }
}
