<?php
/**
 * Class LorryReceiptsTable
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

class CreateLorryReceiptsTable extends Migration
{ 
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('lorry_receipts', function (Blueprint $table) {
            $table->id();
            $table->longText('lr_no')->comment('..');                       
                 $table->longText('payload')->comment('..');                       
                 $table->double('total_distance')->comment('..');                       
                 $table->date('estimated_at')->comment('..');                       
                 $table->date('started_at')->comment('....');                       
                 $table->date('completed_at')->comment('..');                       
                 $table->text('est_duration')->comment('.');                       
                 $table->bigInteger('branch_id')->comment('.');                       
                 $table->bigInteger('consignor_id')->comment('.');                       
                 $table->bigInteger('consignee_id')->comment('.');                       
                 $table->json('devices')->comment('.');                       
                               
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
        Schema::dropIfExists('lorry_receipts');
    }
}
