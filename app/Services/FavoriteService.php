<?php
declare(strict_types=1);

namespace App\Services;

use App\DataProvider\FavoriteRepositoryInterface;


class FavoriteService
{
    /**
     * @var FavoriteRepositoryInterface
     */
    private $favorite;

    /**
     * Create a new service instance.
     *
     * @return void
     */
    public function __construct(FavoriteRepositoryInterface $favorite)
    {
        $this->favorite = $favorite;
    }

    /**
     * Switch to Favorite Status
     *
     * @param  int $bookId
     * @param  int $userId
     * @param  string $createdAt
     *
     * @return int  turn on:1 / turn off: 0
     */
    public function switchFavorite(int $bookId, int $userId, string $createdAt): int
    {
        return $this->favorite->switch($bookId, $userId, $createdAt);
    }
}