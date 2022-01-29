<?php

namespace App\Http\data_access\executors\lessons;

use App\data_access\executors\RemoteProfessorsExecutor;
use App\Http\data_access\data_base_models\Lesson;
use App\Http\data_access\data_transfer_models\LessonTr;
use App\Http\data_access\data_transfer_models\UniversityTr;
use App\Http\data_access\executors\universities\UniversitiesExecutor;
use App\Http\data_access\queries\lessons\LessonsQueries;
use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Exception\UnsupportedOperationException;

class LessonsExecutorImpl implements LessonsExecutor
{
    private $lessonsQueries;
    private $universitiesExecutor;
    private $remoteProfessorsExecutor;
    private $mapper;

    public function __construct(
        LessonsQueries $lessonsQueries,
        UniversitiesExecutor $universitiesExecutor,
        RemoteProfessorsExecutor $remoteProfessorsExecutor
    ) {
        $this->lessonsQueries = $lessonsQueries;
        $this->universitiesExecutor = $universitiesExecutor;
        $this->remoteProfessorsExecutor = $remoteProfessorsExecutor;

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
        dd($lessonTr);
        $lesson = $this->mapper->map($lessonTr, Lesson::class);
        //dd($lesson = $this->mapper->map($lessonTr, Lesson::class));
        if ($lesson->id == null) {
            $lesson->id = $this->lessonsQueries->create($lesson);
            ($lessonTr->id = $lesson->id);
        }
        dd($lessonTr->university);
        if ($lessonTr->university != null) {
            $universityTr = $lessonTr->university;
            if ($universityTr->id == null) {
                $universityTr = $this->universitiesExecutor->create($lessonTr->university);
            }
        } else {
            throw new UnsupportedOperationException('University missing!');
        }

        if ($lessonTr->remoteProfessor != null) {
            $remoteProfessorTr = $lessonTr->remoteProfessor;
            if ($remoteProfessorTr->id == null) {
                $remoteProfessorTr = $this->remoteProfessorsExecutor->create($lessonTr->remoteProfessor);
            }
            $lesson->remoteProfessors()->attach($remoteProfessorTr->id);
        }
        $lesson->universities()->sync([$universityTr->id]);
        $newLessonTr =  $this->mapper->map($lesson, LessonTr::class);
        $lesson = Lesson::has($newLessonTr->id);
        dd($lesson->universities, $lesson->remoteProfessors);
        return $newLessonTr;
    }
    public function update($id, LessonTr $newLessonTr)
    {
        $newLesson = $this->mapper->map($newLessonTr, Lesson::class);
        return $this->lessonsQueries->update($newLesson, $id);
    }

    public function getByID($id)
    {
        $lesson = $this->lessonsQueries->getByID($id);
        return $lesson;
    }


    public function delete($id)
    {
        return $this->lessonsQueries->delete($id);
        //return null;
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

    public function toTransferModel(array $modelArray)
    {
        $tr = new LessonTr();
        $tr->init($modelArray);
        return $tr;
    }
}
