<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Etnia
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Etnia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Etnia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Etnia query()
 * @method static \Illuminate\Database\Eloquent\Builder|Etnia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etnia whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etnia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etnia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Etnia extends Model
{
    use HasFactory;

    protected $table = 'etnia';
}
