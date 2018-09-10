<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class AddEventStoreAggregateTypeField extends Migration
{
    /**
     * @var string
     */
    private $eventStoreTableName;

    public function __construct()
    {
        $this->eventStoreTableName = Config::get('broadway.event-store-table', 'event_store');
    }

    public function up()
    {
        Schema::table($this->eventStoreTableName, function (Blueprint $table) {
            $table->text('aggregate_type');
        });
    }

    public function down()
    {
        Schema::table($this->eventStoreTableName, function (Blueprint $table) {
            $table->dropColumn(['aggregate_type']);
        });
    }
}
