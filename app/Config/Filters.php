<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'filterauth' => \App\Filters\FilterAuth::class,
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			'filterauth' => [ 'except' => [
				'auth' , 'auth/*',
				'home' , 'home/*',
				'/'
			]]
			//'honeypot'
			// 'csrf',
		],
		'after'  => [
			'filterauth' => [ 'except' => [
				'admin' , 'admin/*',
				'home' , 'home/*',
				'/',
				'fakultas' , 'fakultas/*',
				'gedung' , 'gedung/*',
				'ruangan' , 'ruangan/*',
				'prodi' , 'prodi/*',
				'ta' , 'ta/*',
				'matkul' , 'matkul/*',
				'user' , 'user/*',
				'dosen' , 'dosen/*',
				'mahasiswa' , 'mahasiswa/*',
				'kelas' , 'kelas/*',
				'jadwalkuliah' , 'jadwalkuliah/*',
			]],
			'toolbar',
			//'honeypot'

		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [];
}
