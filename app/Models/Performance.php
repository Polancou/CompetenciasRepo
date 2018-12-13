<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 13 Dec 2018 01:28:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Performance
 * 
 * @property int $id
 * @property int $competencia
 * @property string $excelente
 * @property int $valorex
 * @property string $notable
 * @property int $valornot
 * @property string $bueno
 * @property int $valorb
 * @property string $suficiente
 * @property int $valorsuf
 * @property string $insuficiente
 * @property int $valorinsuf
 * 
 * @property \App\Models\Competition $competition
 *
 * @package App\Models
 */
class Performance extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'competencia' => 'int',
		'valorex' => 'int',
		'valornot' => 'int',
		'valorb' => 'int',
		'valorsuf' => 'int',
		'valorinsuf' => 'int'
	];

	protected $fillable = [
		'competencia',
		'excelente',
		'valorex',
		'notable',
		'valornot',
		'bueno',
		'valorb',
		'suficiente',
		'valorsuf',
		'insuficiente',
		'valorinsuf'
	];

	public function competition()
	{
		return $this->belongsTo(\App\Models\Competition::class, 'competencia');
	}
}
