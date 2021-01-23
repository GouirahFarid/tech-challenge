<?php


namespace App\services;


interface IService
{
    public  function getAll();
    public  function getModelById($modelId);
    public function CreateModel($model);
    public function deleteModel($modelId);

}
