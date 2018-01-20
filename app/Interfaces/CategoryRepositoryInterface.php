<?php

namespace App\Interfaces;

use App\Interfaces\CategoryRepositoryInterface;

Interface CategoryRepositoryInterface {
	public function findCat($id);
}