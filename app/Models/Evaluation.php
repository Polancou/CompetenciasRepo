<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 13 Dec 2018 01:28:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Evaluation
 * 
 * @property int $id
 * @property string $evidencia
 * @property int $porcentaje
 * @property int $a
 * @property int $b
 * @property int $c
 * @property int $d
 * @property int $e
 * @property int $f
 * @property string $evaluacion
 * @property int $competencia
 * 
 * @property \App\Models\Competition $competition
 *
 * @package App\Models
 */
class Evaluation extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'porcentaje' => 'int',
		'a' => 'int',
		'b' => 'int',
		'c' => 'int',
		'd' => 'int',
		'e' => 'int',
		'f' => 'int',
		'competencia' => 'int'
	];

	protected $fillable = [
		'evidencia',
		'porcentaje',
		'a',
		'b',
		'c',
		'd',
		'e',
		'f',
		'evaluacion',
		'competencia'
	];

	public function competition()
	{
		return $this->belongsTo(\App\Models\Competition::class, 'competencia');
	}
}
