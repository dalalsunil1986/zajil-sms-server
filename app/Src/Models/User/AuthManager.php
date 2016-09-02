<?php
namespace App\Src\Models\User;

use App\Src\Models\User\User;

class AuthManager
{

    public $userRepository;

    /**
     * @param User $userRepository
     */
    public function __construct(User $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Register / Activte a User
     * @param $token
     * @return bool
     * @throws \Exception
     */
    public function activateUser($email, $token)
    {
        $user = $this->userRepository->where('email', $email)->where('activation_code', $token)->first();
        if (!$user) {
            throw new \Exception('Invalid Token');
        }

        $this->activate($user);

        return $user;

    }

    /**
     * @param User $user
     */
    private function activate(User $user)
    {
        $user->active = 1;

        // set confirmation code to null
        $user->activation_code = '';

        $user->save();

    }


}