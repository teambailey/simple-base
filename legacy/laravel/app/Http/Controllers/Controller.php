<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use App\User;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

    // The authenticated user.
    //
    // @return \App\User|null
    //
    protected $user;

    // Is the user signed in?
    //
    // @return \App\User|null
    //
    protected $signedIn;

    // Create a new controller instance.
    //
    // @return
    //
    public function __construct()

    {

        $this->user = $this->signedIn = Auth::user();


    }

}
