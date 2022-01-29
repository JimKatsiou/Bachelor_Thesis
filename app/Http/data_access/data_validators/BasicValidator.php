<?php


namespace App\Http\data_access\data_validators;

use App\data_access\data_transfer_models\TransferModel;

interface BasicValidator
{
    //  θα γίνει LessonTr
    // για κάθε function τι τύπου δεδομένα επιστρέφει

    public function validate(TransferModel $tr);

    //TODO here add more complex queries






}
