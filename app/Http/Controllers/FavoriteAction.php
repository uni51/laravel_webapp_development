<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\FavoriteService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class FavoriteAction extends Controller
{
    /**
     * @var \App\Services\FavoriteService
     */
    private $favorite;

    /**
     * Create a new Controller instance.
     *
     * @return void
     */
    public function __construct(FavoriteService $favorite)
    {
        $this->favorite = $favorite;
    }

    /**
     * Switch to Favorite Status
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return response
     */
    public function switchFavorite(Request $request)
    {
        $this->favorite->switchFavorite(
            (int)$request->get('book_id'),
            (int)$request->get('user_id', 1),
            Carbon::now()->toDateTimeString()
        );
        return response('', Response::HTTP_OK);
    }
}