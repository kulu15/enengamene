<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizReponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'quiz_reponses';
        Schema::create($tableName, function (Blueprint $table) {
            $table->id();

            $table->string('libelle')->unique()->comment('libelle de la Réponse de Quiz');
            $table->string('description')->nullable()->comment('description de la Réponse de Quiz');
            $table->string('commentaire')->nullable()->comment('commentaire sur la Réponse de Quiz');

            $table->unsignedBigInteger('quiz_question_id')->nullable()->comment('référence de la Question de Quiz rattachée');
            $table->foreign('quiz_question_id')->references('id')->on('quiz_questions')->onDelete('set null');

            $table->boolean('statut')->is_default(false)->comment('Statut de la Réponse de Quiz');
            $table->boolean('etat')->is_default(false)->comment('Etat de la Réponse de Quiz');

            $table->timestamps();
        });
        DB::statement("ALTER TABLE `$tableName` comment 'Reponses probables a une Question de Quiz du Système.'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropForeign(['quiz_question_id']);
        });
        Schema::dropIfExists('quiz_reponses');
    }
}
