<?php

namespace App\Models;

use App\Models\Utils\SearchUtils;
use Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Logradouro
 *
 * @property int $id
 * @property string $nome
 * @property string $cep
 * @property int $bairro_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\Bairro $bairro
 * @property-read Collection|\App\Models\Escola[] $escolas
 * @property-read int|null $escolas_count
 * @property-read Collection|\App\Models\PessoaEndereco[] $pessoa_enderecos
 * @property-read int|null $pessoa_enderecos_count
 * @method static Builder|Logradouro newModelQuery()
 * @method static Builder|Logradouro newQuery()
 * @method static Builder|Logradouro query()
 * @method static Builder|Logradouro whereBairroId($value)
 * @method static Builder|Logradouro whereCep($value)
 * @method static Builder|Logradouro whereCreatedAt($value)
 * @method static Builder|Logradouro whereId($value)
 * @method static Builder|Logradouro whereNome($value)
 * @method static Builder|Logradouro whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Logradouro extends Model
{
    use HasFactory;

    protected $table = 'logradouro';

    public function bairro()
    {
        return $this->belongsTo(Bairro::class, 'bairro_id');
    }

    public function escolas()
    {
        return $this->hasMany(Escola::class, 'logradouro_id');
    }

    public function pessoa_enderecos()
    {
        return $this->hasMany(PessoaEndereco::class, 'logradouro_id');
    }

    public function index()
    {
        return self::join('bairro', 'bairro.id', '=', 'bairro_id')
            ->join('cidade', 'cidade.id', '=', 'cidade_id')
            ->join('estado', 'estado.id', '=', 'estado_id')
            ->selectRaw('logradouro.id, logradouro.nome, logradouro.cep, bairro_id,bairro.nome as bairro, cidade_id,cidade.nome as cidade, estado_id,estado.nome as estado')
            ->orderByRaw('estado, cidade, bairro, logradouro.nome,cep')
            ->paginate(50);
    }

    public function createOrUpdate($fields, $id = null)
    {
        $fields = (object)$fields;
        $cep = preg_replace('/[^0-9]/', '', $fields->cep);
        $exist_lograd = $this->existLograd($cep,$fields->bairro,$fields->cidade,$fields->estado,$id);

        if($exist_lograd)
            throw new Exception('Logradouro já existe!', -403);

        if ($id) {
            $logradouro = Logradouro::find($id);
        } else {
            $logradouro = new Logradouro();
        }

        $bairro = Bairro::getOrCreate($fields->bairro, $fields->cidade, $fields->estado);
        $logradouro->nome = $fields->logradouro;
        $logradouro->cep = $cep;
        $logradouro->bairro_id = $bairro->id;
        $logradouro->save();

        return $this->show($logradouro->id);
    }

    public function show($id)
    {
        $show = self::join('bairro', 'bairro.id', '=', 'bairro_id')
            ->join('cidade', 'cidade.id', '=', 'cidade_id')
            ->join('estado', 'estado.id', '=', 'estado_id')
            ->selectRaw('logradouro.id, logradouro.nome, logradouro.cep, bairro_id, bairro.nome as bairro, cidade_id, cidade.nome as cidade, estado_id, estado.nome as estado')
            ->where('logradouro.id', '=', $id)
            ->first();

        if (!$show) {
            throw new Exception('Nada Encontrado', -404);
        }

        return $show;
    }

    public function remove($id)
    {
        $lograd = Logradouro::find($id);

        if (!$lograd) {
            throw new Exception('Nada Encontrado', -404);
        }

        $logradouro_tmp = $this->show($lograd->id);

        $lograd->delete();
        return $logradouro_tmp;
    }

    public function search($data)
    {
        $logradouros = self::join('bairro', 'bairro.id', '=', 'bairro_id')
            ->join('cidade', 'cidade.id', '=', 'cidade_id')
            ->join('estado', 'estado.id', '=', 'estado_id')
            ->selectRaw('logradouro.id, logradouro.nome, logradouro.cep, bairro_id, bairro.nome as bairro, cidade_id, cidade.nome as cidade, estado_id, estado.nome as estado')
            ->orderByRaw('estado, cidade, bairro, logradouro.nome,cep');

        $logradouros = SearchUtils::createQuery($data, $logradouros);

        return $logradouros->get();
    }

    public function existLograd($cep,$bairro,$cidade,$estado,$id = null){
        $id = (int) $id;

        $lograd = self::join('bairro', 'bairro.id', '=', 'bairro_id')
            ->join('cidade', 'cidade.id', '=', 'cidade_id')
            ->join('estado', 'estado.id', '=', 'estado_id')
            ->selectRaw('logradouro.*')
            ->where('logradouro.cep', '=', $cep)
            ->where('bairro.nome', '=', $bairro)
            ->where('cidade.nome', '=', $cidade)
            ->where('estado.nome', '=', $estado)
            ->where('logradouro.id','<>',$id)
            ->first();

        return $lograd;
    }


//    public static function boot() {
//        parent::boot();
//        self::deleting(function($lograd) { // before delete() method call this
//            $lograd->comments()->each(function($comment) {
//                $comment->delete(); // <-- direct deletion
//            });
//            // do the rest of the cleanup...
//        });
//    }
}
