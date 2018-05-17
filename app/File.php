<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model {


public function Documents(){

	return $this->belongsTo(Document::class);
}

}
