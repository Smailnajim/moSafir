<?php

namespace App\Repositories\Eloquent;

use App\Models\Status;
use App\Repositories\Interfaces\IStatus;

class StatusRepository extends FloorRepository implements IStatus{

    public function __construct(Status $status)
    {
        parent::__construct($status);
    }


}