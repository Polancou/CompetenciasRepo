<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 13 Dec 2018 01:28:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class News
 * 
 * @property int $id
 * @property int $competencias
 * @property string $fuentes
 * @property string $apoyos
 * 
 * @property \App\Models\Competition $competition
 *
 * @package App\Models
 */
class News extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'competencias' => 'int'
	];

	protected $fillable = [
		'competencias',
		'fuentes',
		'apoyos'
	];

	public function competition()
	{
		return $this->belongsTo(\App\Models\Competition::class, 'competencias');
	}
}
