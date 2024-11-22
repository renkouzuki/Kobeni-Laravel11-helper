<?php

namespace App\Traits;

use Database\QueryBuilder\Delete;
use Database\QueryBuilder\FindAll;
use Database\QueryBuilder\FindId;
use Database\QueryBuilder\Insert;
use Database\QueryBuilder\Update;

trait KobeniQuery
{
    protected $findAll;
    protected $delete;
    protected $update;
    protected $findId;
    protected $insert;

    public function bootKobeniQuery(){
        $this->findAll = app(FindAll::class);
        $this->findId = app(FindId::class);
        $this->delete = app(Delete::class);
        $this->insert = app(Insert::class);
        $this->update = app(Update::class);
    }
}
