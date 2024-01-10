<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function getProfileImage($userId)
    {
        $user = User::find($userId);

        if (!$user || !$user->foto) {
            abort(404);
        }

        $path = asset('img/uploaded_img/' . $user->foto);

        return response()->file($path);
    }
}
