<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 13 Dec 2018 01:28:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Subject
 * 
 * @property int $id
 * @property string $nombre
 * @property string $planestudios
 * @property string $clave
 * @property string $horas
 * @property string $periodo
 * @property string $caracterizacion
 * @property string $intencion
 * @property string $competencia
 * 
 * @property \Illuminate\Database\Eloquent\Collection $competitions
 *
 * @package App\Models
 */
class Subject extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'planestudios',
		'clave',
		'horas',
		'periodo',
		'caracterizacion',
		'intencion',
		'competencia'
	];

	public function competitions()
	{
		return $this->hasMany(\App\Models\Competition::class, 'asignatura');
	}
}
