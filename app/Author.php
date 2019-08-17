<?php
declare(strict_types=1); // 厳密な型チェックモードにする

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes; // DBテーブルからデータを物理削除するのではなく論理削除を行う機能があります。

    /**
     * 著者は複数の書籍レコードを持つ
     */
    public function books()
    {
        return $this->hasMany('\App\Book');
    }
}
