<?php


namespace App\repositories;


interface IRepository
{
    public  function getAll();
    public  function getById($id);
    public  function create($model);
    public  function delete($id);

}
