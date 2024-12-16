<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rmodel extends Model
{
    use HasFactory;

    protected $primarykey = "id";
    public $timespatams = true;
    public $incremeting = true;
    protected $fillable = [];

    public function beforeSave()
    {
        return true;
    }

    public function save(array $options = [])
    {
        try {

            if (!$this->beforeSave()) {
                return false;
            } else {
                return parent::save($options);
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
