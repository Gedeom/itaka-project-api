<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CondicaoMoradia
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia query()
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CondicaoMoradia extends Model
{
    use HasFactory;

    protected $table = 'condicao_moradia';
}
