<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title')->nullable(); //for html head title
            $table->string('short_title')->nullable(); //for fold of admin panel sidebar (3 char) TMM for taslima marriage media
            $table->string('h1')->nullable();
            $table->string('slogan')->nullable();
            $table->string('logo')->nullable(); //png jpg gif
            $table->string('favicon')->nullable(); //ico
            $table->text('google_analytics_code')->nullable();
            $table->text('facebook_pixel_code')->nullable();
            $table->string('meta_author')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('footer_address')->nullable();
            $table->text('footer_copyright')->nullable();
            $table->string('fb_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('pinterest_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('google_plus_url')->nullable();
            // $table->string('main_color')->nullable();
            // $table->string('sub_color')->nullable();
            // $table->string('android_apk')->nullable(); //android apk
            // $table->string('header_bg_color')->nullable();
            // $table->string('header_text_color')->nullable();
            // $table->string('footer_bg_color')->nullable();
            // $table->string('footer_text_color')->nullable();
            $table->text('google_map_code')->nullable();
            $table->text('message_to_users')->nullable();
            $table->string('addthis_url')->nullable();
            $table->string('youtube_code')->nullable();
            $table->string('fb_page_code')->nullable();
            $table->string('about_sub_img')->nullable();
            $table->string('package_sub_img')->nullable();
            $table->string('story_sub_img')->nullable();
            $table->string('contact_sub_img')->nullable();
            $table->integer('editedby_id')->unsigned()->nullable();
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
        Schema::dropIfExists('website_parameters');
    }
}
