<?php

namespace App\Repositories;

use App\Entities\Client;
use App\Repositories\Contracts\ClientRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{

    public function model()
    {
        return Client::class;
    }

}
