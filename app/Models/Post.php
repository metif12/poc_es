<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JeroenG\Explorer\Application\Explored;
use Laravel\Scout\Searchable;

class Post extends Model implements Explored
{
    use HasFactory;
    use Searchable;

    protected $guarded = ['id'];

    // how data type map to elastic search
    public function mappableAs(): array
    {
        return [
            'id' => 'keyword',
            'title' => 'text',
            'content' => 'text',
            'published' => 'boolean',
            'created_at' => 'date',
        ];
    }

    // do something with data before goes into elastic
    public function prepare(array $searchable): array
    {
        $searchable['title'] = ucfirst($searchable['title']);

        return $searchable;
    }
}
