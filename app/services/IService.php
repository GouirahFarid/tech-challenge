<?php


namespace App\services;


interface IService
{
    public  function getAllModels();
    public  function getModelById($modelId);
    public function CreateModel($model);
    public function deleteModel($modelId);

}
