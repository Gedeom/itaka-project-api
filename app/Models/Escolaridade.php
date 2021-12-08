<?php

namespace App\Models;

use App\Models\Utils\SearchUtils;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

class Escolaridade extends Model
{
    use HasFactory;

    protected $table = 'escolaridade';

    public function index()
    {
        return self::selectRaw('id, descricao')
            ->get();
    }

    public function show($id)
    {
        $parentesco = self::selectRaw('id, descricao')
            ->where('id', '=', $id)
            ->first();


        if (!$parentesco) {
            throw new Exception('Nada Encontrado', -404);
        }

        return $parentesco;
    }

    public function remove($id)
    {
        throw new Exception('Não suportado', -403);

    }

    public function search($data)
    {
        $escolaridade = self::selectRaw('id, descricao');

        $escolaridade = (SearchUtils::createQuery($data, $escolaridade))->get();

        return $escolaridade;
    }

    public function createOrUpdate($fields, $id = null)
    {
        throw new Exception('Não suportado', -403);
    }

}
