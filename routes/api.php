<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('v1')
    ->group(function () {

        // posts
        Route::prefix('posts')
            ->group(function () {
                Route::get('/', function (Request $request) {

                    if ($request->search) {
                        $query = \App\Models\Post::search($request->search)
                            ->must(new \JeroenG\Explorer\Domain\Syntax\Term('published', true))
                            ->orderBy('created_at', 'desc');
                    }
                    else {
                        $query = \App\Models\Post::query();
                    }

                    $result = $query->paginate(10);

                    if(config('app.debug'))
                        $result['debug'] = \JeroenG\Explorer\Infrastructure\Scout\ElasticEngine::debug()->array();

                    return $result;
                });
            });
    });
