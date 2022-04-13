<?php

$config = [
	'login_admin' => [
		[
			'field' => 'username',
			'label' => '',
			'rules' => 'required|max_length[20]',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!',
				'max_length' => 'Maksimal {param} Digit Angka!'
			]
		], [
			'field' => 'password',
			'label' => '',
			'rules' => 'required|trim|max_length[16]',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!',
				'max_length' => 'Maksimal {param} Digit Angka!'
			]
		]
	], 'login_guru' => [
		[
			'field' => 'nip',
			'label' => '',
			'rules' => 'required|trim|numeric|max_length[21]',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!',
				'numeric' => 'Hanya Boleh Diisi Angka!',
				'max_length' => 'Maksimal {param} Digit Angka!'
			]
		], [
			'field' => 'password',
			'label' => '',
			'rules' => 'required|trim|max_length[16]',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!',
				'max_length' => 'Maksimal {param} Digit Angka!'
			]
		]
	], 'login_siswa' => [
		[
			'field' => 'nisn',
			'label' => '',
			'rules' => 'required|trim|numeric|max_length[20]',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!',
				'numeric' => 'Hanya Boleh Diisi Angka!',
				'max_length' => 'Maksimal {param} Digit Angka!'
			]
		], [
			'field' => 'password',
			'label' => '',
			'rules' => 'required|trim|max_length[16]',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!',
				'max_length' => 'Maksimal {param} Digit Angka!'
			]
		]
	], 'form_absen' => [
		[
			'field' => 'ttd',
			'label' => '',
			'rules' => 'required',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!'
			]
		]
	], 'tambahGuru' =>
	[
		[
			'field' => 'nip',
			'label' => '',
			'rules' => 'required|max_length[21]|numeric|is_unique[guru.nip]',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!',
				'max_length' => 'Maksimal {param} Digit Angka!',
				'numeric' => 'Hanya Boleh Diisi Angka!',
				'is_unique' => 'Nip Sudah Digunakan!'
			]
		], [
			'field' => 'namaGuru',
			'label' => '',
			'rules' => 'required|max_length[35]',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!',
				'max_length' => 'Maksimal {param} Huruf!'
			]
		], [
			'field' => 'status',
			'label' => '',
			'rules' => 'required',
			'errors' => [
				'required' => 'Pilih, Tidak Boleh Kosong!'
			]
		]
	], 'tambahSiswa' =>
	[
		[
			'field' => 'nisn',
			'label' => '',
			'rules' => 'required|numeric|is_unique[siswa.nisn]',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!',
				'numeric' => 'Hanya Boleh Diisi Angka!',
				'is_unique' => 'Nisn Sudah Digunakan!'
			]
		], [
			'field' => 'namaSiswa',
			'label' => '',
			'rules' => 'required|max_length[35]',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!',
				'max_length' => 'Maksimal {param} Huruf!'
			]
		], [
			'field' => 'kelas',
			'label' => '',
			'rules' => 'required',
			'errors' => [
				'required' => 'Pilih, Tidak Boleh Kosong!'
			]
		]
	], 'ubah_password' =>
	[
		[
			'field' => 'password_lama',
			'label' => '',
			'rules' => 'required|max_length[16]|min_length[3]',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!',
				'max_length' => 'Maksimal {param} Karakter!',
				'min_length' => 'Minimal {param} Karakter!',
			]
		], [
			'field' => 'password_baru',
			'label' => '',
			'rules' => 'required|max_length[16]|min_length[3]',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!',
				'max_length' => 'Maksimal {param} Karakter!',
				'min_length' => 'Minimal {param} Karakter!',
			]
		], [
			'field' => 'konfirmasi_password',
			'label' => '',
			'rules' => 'required|max_length[16]|min_length[3]|matches[password_baru]',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!',
				'max_length' => 'Maksimal {param} Karakter!',
				'min_length' => 'Minimal {param} Karakter!',
				'matches' => 'Password Konfirmasi Tidak Sama!',
			]
		]
	], 'tambahEditAdmin' =>
	[
		[
			'field' => 'nama',
			'label' => '',
			'rules' => 'required',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!',
			]
		], [
			'field' => 'username',
			'label' => '',
			'rules' => 'required|is_unique[admin.username]',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!',
				'is_unique' => 'Username Sudah Digunakan!'
			]
		]
	], 'jam_absen' =>
	[
		[
			'field' => 'hari',
			'label' => '',
			'rules' => 'required',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!'
			]
		], [
			'field' => 'untuk',
			'label' => '',
			'rules' => 'required',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!'
			]
		], [
			'field' => 'datang_mulai',
			'label' => '',
			'rules' => 'required',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!'
			]
		], [
			'field' => 'datang_berakhir',
			'label' => '',
			'rules' => 'required',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!'
			]
		], [
			'field' => 'datang_tutup',
			'label' => '',
			'rules' => 'required',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!'
			]
		], [
			'field' => 'pulang_mulai',
			'label' => '',
			'rules' => 'required',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!'
			]
		], [
			'field' => 'pulang_berakhir',
			'label' => '',
			'rules' => 'required',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!'
			]
		], [
			'field' => 'pulang_tutup',
			'label' => '',
			'rules' => 'required',
			'errors' => [
				'required' => 'Tidak Boleh Kosong!'
			]
		]
	]
];
