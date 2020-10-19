<?php

namespace App\Services\User;

use App\Models\User;
use League\Fractal\Manager;
use App\Transformer\UserTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class GetAllService {

    /**
     * @var Manager
     */
    private $fractal;

    /**
     * @var UserTransformer
     */
    private $userTransformer;

    function __construct(Manager $fractal)
    {
        $this->fractal = $fractal;
    }

    public function getAll()
    {
        $paginator = User::paginate(5);
        $users = $paginator->getCollection();

        $resource = new Collection($users, new UserTransformer());
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
        $resource = $this->fractal->createData($resource);

        return $resource;
        // dd($resource);
    }
}