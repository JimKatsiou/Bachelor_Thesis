<?php

namespace App\Http\data_access\executors\teaches;

use App\Http\data_access\data_base_models\Lesson;
use App\Http\data_access\data_transfer_models\LessonTr;
use App\Http\data_access\executors\universities\UniversitiesExecutor;
use App\Http\data_access\queries\lessons\LessonsQueries;
use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\Configuration\AutoMapperConfig;


class TeachesExecutorImpl implements TeachesExecutor
{
    private $lessonsQueries;
    private $universitiesExecutor;
    private $remoteProfessorsExecutor;
    private $mapper;

    public function __construct(
        LessonsQueries $lessonsQueries,
        UniversitiesExecutor $universitiesExecutor
    ) {
        $this->lessonsQueries = $lessonsQueries;
        $this->universitiesExecutor = $universitiesExecutor;

        $config = new AutoMapperConfig();
        $config->registerMapping(LessonTr::class, Lesson::class);
        $config->registerMapping(Lesson::class, LessonTr::class);
        $this->mapper = new AutoMapper($config);
    }

    public function getAll()
    {
        $lessonsList = $this->lessonsQueries->getAll();
        return $lessonsList;
    }

    public function create(LessonTr $lessonTr)
    {
        $lesson = $this->mapper->map($lessonTr, Lesson::class);
        if ($lesson->id == null) {
            $lesson->id = $this->lessonsQueries->create($lesson);
        }
        if ($lessonTr->university->id == null) {
            $universityTr = $this->universitiesExecutor->create($lessonTr->university);
        }

        if ($lessonTr->remoteProfessor != null) {
            $remoteProfessor = $this->remoteProfessorsExecutor->create($lessonTr->remoteProfessor);
        }

        if ($lessonTr->professor != null) {
            $user = $this->teachExecutor->create($lessonTr->professor);
        }


        $lesson->universities()->sync($universityTr->id);
        $newLessonTr =  $this->mapper->map($lesson, LessonTr::class);
        $newLessonTr->university = $universityTr;
        return $newLessonTr;
    }











    public function delete($id)
    {
        return $this->lessonsQueries->delete($id);
    }
    public function getByID($id)
    {
        $lesson = $this->lessonsQueries->getByID($id);
        return $lesson;
    }
    public function update($id, LessonTr $newLessonTr)
    {
        $newLesson = $this->mapper->map($newLessonTr, Lesson::class);
        return $this->lessonsQueries->update($newLesson, $id);
    }

    public function remoteProfessors()
    {
        throw new \ErrorException('non support');
    }
    public function universities()
    {
        throw new \ErrorException('non support');
    }
    public function teachers()
    {
        throw new \ErrorException('non support');
    }
    public function participations()
    {
        throw new \ErrorException('non support');
    }
}