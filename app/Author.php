<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model {

public function Documents(){
	return $this->hasMany(Document::class);
}
}
