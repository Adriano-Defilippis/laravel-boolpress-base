<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Post;use App\Category;

class AddCatIdForeingkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('posts', function (Blueprint $table) {

       $table -> bigInteger('category_id') -> unsigned() -> index();
       $table -> foreign('category_id', 'relationPostCategory')
              -> references('id')
              -> on('categories');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('posts', function (Blueprint $table) {

        $table -> dropForeign('relationPostCategory');
        $table -> dropColumn('category_id');
      });
    }
}
