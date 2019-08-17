<?php
declare(strict_types=1);

namespace App\Services;

use App\DataProvider\Eloquent\Favorite;


class FavoriteService
{
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
        return \DB::transaction(
          function () use ($bookId, $userId, $createdAt) {
              $count = Favorite::where('book_id', $bookId)
                  ->where('user_id', $userId)
                  ->count();
              if($count == 0){
                  Favorite::create([
                      'book_id' => $bookId,
                      'user_id' => $userId,
                      'created_at' => $createdAt
                  ]);
                  return 1;
              }
              Favorite::where('book_id', $bookId)
                  ->where('user_id', $userId)
                  ->delete();
              return 0;
          }
        );
    }
}