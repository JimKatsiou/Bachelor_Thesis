<?php

namespace App\Http\data_access\data_transfer_models;

use App\Http\data_access\data_transfer_models\ConnectionTr;
use App\Http\data_access\data_transfer_models\UniversityTr;
use Maksi\LaravelRequestMapper\Filling\RequestData\AllRequestData;


class ParticipationTr extends AllRequestData
{
    public $id = 'id';
    public $semester = 'semester';
    public $year = 'year';
    public $author = null;
    public $connections = null;
    public $university = null;

    /**
     * @param array $data
     */
    protected function init(array $data): void
    {
        $this->id = $data['id'] ?? '';
        $this->semester = $data['semester'] ?? '';
        $this->year = $data['year'] ?? '';


        $inputUniversity = ($data['university'] ?? null);
        if ($inputUniversity !== null) {
            $this->university = new UniversityTr($inputUniversity);
        }

        $inputConnections = ($data['connections'] ?? null);
        if ($inputConnections !== null && count($inputConnections) > 0) {
            $this->connections = array();
            foreach ($inputConnections as $l) {
                array_push($this->connections, new ConnectionTr($l));
            }
        }
    }

        public function lessons()
        {
            return $this->belongsToMany('App\Lesson','participation_user');
        }
    
        public function universities()
        {
            return $this->belongsToMany('App\University','lesson_user');
        }
    
    
        public function users()
        {
            return $this->belongsToMany('App\User','lesson_user');
        }
}
