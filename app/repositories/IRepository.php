<?php


namespace App\repositories;



interface IRepository
{
    public  function getAllModels();
    public  function getById($id);
    public  function paginate($limit);
    public  function create($model);
    public  function delete($id);

}
