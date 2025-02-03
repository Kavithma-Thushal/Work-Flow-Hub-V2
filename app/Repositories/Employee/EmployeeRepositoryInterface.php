<?php

namespace App\Repositories\Employee;

use App\Repositories\CrudRepositoryInterface;

interface EmployeeRepositoryInterface extends CrudRepositoryInterface
{
    public function getByUserId(int $userId);

    public function getByIdAndUserId(int $id, int $userId);
}
