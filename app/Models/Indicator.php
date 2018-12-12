<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Dec 2018 17:05:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Indicator
 * 
 * @property int $id
 * @property int $competencia
 * @property string $indicador
 * @property string $valor
 * 
 * @property \App\Models\Competition $competition
 *
 * @package App\Models
 */
class Indicator extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'competencia' => 'int'
	];

	protected $fillable = [
		'competencia',
		'indicador',
		'valor'
	];

	public function competition()
	{
		return $this->belongsTo(\App\Models\Competition::class, 'competencia');
	}
}
