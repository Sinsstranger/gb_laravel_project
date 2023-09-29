<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Auth;

class GithubAuthController extends Controller
{
    // Метод для перенаправления пользователя на страницу аутентификации Github
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    // Метод для получения данных пользователя из Github и создания или обновления пользователя в базе данных
    public function handleProviderCallback()
    {
        // Получаем данные пользователя из Github
        $user = Socialite::driver('github')->user();

        // Ищем пользователя в базе данных по email
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // Если пользователь уже существует, обновляем его данные из Github
            $existingUser->name = $user->name;
            $existingUser->avatar = $user->avatar;
            $existingUser->github_id = $user->id;
            $existingUser->save();
        } else {
            // Если пользователь не существует, создаем нового пользователя с данными из Github
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->avatar = $user->avatar;
            $newUser->github_id = $user->id;
            $newUser->is_admin = false;
            $newUser->password = \fake()->md5();
            $newUser->save();
        }

        // Аутентифицируем пользователя и перенаправляем его на главную страницу
        Auth::login($existingUser ?? $newUser);
        return redirect('/');
    }
}
