<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Tag;
use App\Models\Contact;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Contact::Class)
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignIdFor(Tag::Class)
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('intensity');
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
        Schema::dropIfExists('categoria_persona');
    }
};
