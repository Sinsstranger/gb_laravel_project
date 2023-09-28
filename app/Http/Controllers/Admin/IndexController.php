<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        return \view('admin.index',['h1' => 'Панель управления']);
    }
}
