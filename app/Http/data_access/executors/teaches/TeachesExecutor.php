<?php


namespace App\Http\data_access\executors\teaches;

use App\Http\data_access\data_transfer_models\LessonTr;

interface TeachesExecutor
{

    //  θα γίνει LessonTr
    // για κάθε function τι τύπου δεδομένα επιστρέφει
    // controller(LessonTr) -> LessonsExecutor -> query(Lesson)
    // controller(LessonTr) <- LessonsExecutor <- query(Lesson)

    public function getAll();
    public function create(LessonTr $lessonTr);
    public function delete($id);
    public function getByID($id);
    public function update($id, LessonTr $lessonTr);

    public function remoteProfessors();
    public function universities();
    public function teachers();
    public function participations();

    //TODO here add more complex queries






}