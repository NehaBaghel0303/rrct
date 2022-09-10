<?php
/**
 * Class DeviceLogsTable
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

class CreateDeviceLogsTable extends Migration
{ 
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('device_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lr_id')->comment('.');                       
                 $table->date('lat')->comment('.');                       
                 $table->date('lon')->comment('.');                       
                 $table->integer('vehicle_no')->comment('.');                       
                 $table->integer('type')->comment('.');                       
                 $table->integer('vht_type')->comment('.');                       
                 $table->bigInteger('device_id')->comment('.');                       
                               
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
        Schema::dropIfExists('device_logs');
    }
}
