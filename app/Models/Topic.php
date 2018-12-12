<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 12 Dec 2018 17:05:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Topic
 * 
 * @property int $id
 * @property string $tema
 * @property string $activ_apren
 * @property string $activ_ene
 * @property string $desarrollo_com
 * @property string $horas
 * @property int $competencia
 * 
 * @property \App\Models\Competition $competition
 *
 * @package App\Models
 */
class Topic extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'competencia' => 'int'
	];

	protected $fillable = [
		'tema',
		'activ_apren',
		'activ_ene',
		'desarrollo_com',
		'horas',
		'competencia'
	];

	public function competition()
	{
		return $this->belongsTo(\App\Models\Competition::class, 'competencia');
	}
}
