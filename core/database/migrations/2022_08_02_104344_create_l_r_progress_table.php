<?php
/**
 * Class LRProgressTable
 *
 * @category  zStarter
 *
 * @ref  zCURD
 * @author    Defenzelite <hq@defenzelite.com>
 * @license  https://www.defenzelite.com Defenzelite Private Limited
 * @version  <zStarter: 1.1.0>
 * @link        https://www.defenzelite.com
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLRProgressTable extends Migration
{ 
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('l_r_progress', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lr_id')->comment('.');                       
                 $table->bigInteger('device_id')->comment('.');                       
                 $table->integer('type')->comment('.');                       
                 $table->integer('vht_type')->comment('.');                       
                 $table->text('distance_covered')->comment('.');                       
                 $table->text('distance_remain')->comment('.');                       
                               
            $table->timestamps();
                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::dropIfExists('l_r_progress');
    }
}
