<?php

namespace App\Repositories\Employee;

use App\Models\Employee;
use App\Repositories\CrudRepository;

class EmployeeRepository extends CrudRepository implements EmployeeRepositoryInterface
{
    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }

    public function getByUserId(int $userId)
    {
        return Employee::where('user_id', $userId)->get();
    }

    public function getByIdAndUserId(int $id, int $userId)
    {
        return Employee::where('id', $id)
            ->where('user_id', $userId)
            ->first();
    }
}
