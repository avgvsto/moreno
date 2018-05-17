<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model {


public function Authors(){
	return $this->belongsTo(Author::class);
}

public function Files(){
	return $this->hasMany(File::class);
}


}
