<?php
/**
 * Created by PhpStorm.
 * User: tomasz
 * Date: 28.08.2016
 * Time: 22:03
 */

namespace App\Repositories;

use App\User;

class TaskRepository
{

    /**
     * @param User $user
     * @return mixed
     */
    public function forUser(User $user)
    {
        return $user->tasks()
                    ->orderBy('created_at', 'asc')
                    ->get();
    }

}