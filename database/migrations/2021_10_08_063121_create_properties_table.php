<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('price')->nullable();
            $table->string('after_price_label')->nullable();
            $table->string('before_price_label')->nullable();
            $table->string('category')->nullable();
            $table->string('listed_in')->nullable();
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('zip')->nullable();
            $table->string('country_state')->nullable();
            $table->string('country')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('enable_google_street_view')->nullable();
            $table->string('google_street_view')->nullable();
            $table->string('size_in_ft2')->nullable();
            $table->string('lot_size_in_ft2')->nullable();
            $table->string('rooms')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('custom_id')->nullable();
            $table->string('year_built')->nullable();
            $table->string('garages')->nullable();
            $table->date('available_from')->nullable();
            $table->string('garage_size')->nullable();
            $table->string('external_construction')->nullable();
            $table->string('basement')->nullable();
            $table->string('exterior_material')->nullable();
            $table->string('floor_plan_2D')->nullable();
            $table->string('floor_plan_3D')->nullable();
            $table->string('roofing')->nullable();
            $table->string('floors_no')->nullable();
            $table->string('structure_type')->nullable();
            $table->string('owner_agent_note')->nullable();
            $table->string('property_status')->nullable();
            $table->string('agent_id')->nullable();
            $table->string('amenities_feature')->nullable();
            $table->string('video_from')->nullable();
            $table->string('embed_video_id')->nullable();
            $table->string('virtual_tour')->nullable();
            $table->string('subunits')->nullable();
            $table->string('user_id')->nullable();
            $table->time('created_time')->nullable();
            $table->string('property_type')->nullable();
            $table->string('internal_status')->nullable();
            $table->string('most_recent_upload')->nullable();
            $table->date('created_date')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
