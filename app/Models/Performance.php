<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Dec 2018 17:05:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Performance
 * 
 * @property int $id
 * @property string $nivel
 * @property string $indicador
 * @property string $valoracion
 * @property int $competencia
 * 
 * @property \App\Models\Competition $competition
 *
 * @package App\Models
 */
class Performance extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'competencia' => 'int'
	];

	protected $fillable = [
		'nivel',
		'indicador',
		'valoracion',
		'competencia'
	];

	public function competition()
	{
		return $this->belongsTo(\App\Models\Competition::class, 'competencia');
	}
}
