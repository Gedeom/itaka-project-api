<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Parentesco
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Parentesco newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parentesco newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parentesco query()
 * @method static \Illuminate\Database\Eloquent\Builder|Parentesco whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parentesco whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parentesco whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parentesco whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Parentesco extends Model
{
    use HasFactory;

    protected $table  = 'parentesco';
}
