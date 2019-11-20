<?php

namespace App\Events\Frontend\Auth;

use Illuminate\Queue\SerializesModels;
use App\Traits\SendCreatePasswordMail;

/**
 * Class UserConfirmed.
 */
class UserConfirmed
{
    use SerializesModels;
    use SendCreatePasswordMail;

    /**
     * @var
     */
    public $user;

    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
}
