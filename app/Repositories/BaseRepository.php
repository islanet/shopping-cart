<?php

namespace App\Repositories;


abstract class BaseRepository
{
    abstract public function getModel();
    public function find($id, $with)
    {
        return $this->getModel()->where('id',$id)->with($with)->first();
    }

    public function getAll()
    {
        return $this->getModel()->all();
    }

    public function create($data)
    {
        return $this->getModel()->create($data);
    }

    public function update($objet, $data)
    {
        $objet->fill( $data);
        $objet->save();
        return $objet;
    }

    public function delete($objet):void
    {
        $objet->delete();
    }


}
