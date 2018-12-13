<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 13 Dec 2018 01:28:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Competition
 * 
 * @property int $id
 * @property int $asignatura
 * @property int $nombre
 * @property string $descripcion
 * 
 * @property \App\Models\Subject $subject
 * @property \Illuminate\Database\Eloquent\Collection $evaluations
 * @property \Illuminate\Database\Eloquent\Collection $indicators
 * @property \Illuminate\Database\Eloquent\Collection $news
 * @property \Illuminate\Database\Eloquent\Collection $performances
 * @property \Illuminate\Database\Eloquent\Collection $topics
 *
 * @package App\Models
 */
class Competition extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'asignatura' => 'int',
		'nombre' => 'int'
	];

	protected $fillable = [
		'asignatura',
		'nombre',
		'descripcion'
	];

	public function subject()
	{
		return $this->belongsTo(\App\Models\Subject::class, 'asignatura');
	}

	public function evaluations()
	{
		return $this->hasMany(\App\Models\Evaluation::class, 'competencia');
	}

	public function indicators()
	{
		return $this->hasMany(\App\Models\Indicator::class, 'competencia');
	}

	public function news()
	{
		return $this->hasMany(\App\Models\News::class, 'competencias');
	}

	public function performances()
	{
		return $this->hasMany(\App\Models\Performance::class, 'competencia');
	}

	public function topics()
	{
		return $this->hasMany(\App\Models\Topic::class, 'competencia');
	}
}
