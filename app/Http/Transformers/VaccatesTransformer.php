<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\Vaccate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class VaccatesTransformer
{

    public function transformVaccates (Collection $vaccates, $total)
    {
        $array = array();
        foreach ($vaccates as $vaccate) {
            $array[] = self::transformVaccate($vaccate);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformVaccate (Vaccate $vaccate = null)
    {
        if ($vaccate) {

            $array = [
                'id' => (int) $vaccate->id,
                'res_name' => e($vaccate->res_name),
                'v_date' => e($vaccate->v_date),
                'address' => e($vaccate->address),
                'created_at' => e(date('d-m-Y', strtotime($vaccate->created_at))),
                'actions' => view('vaccates/datatables_actions', compact('vaccate'))->render() 
                
            ];


            return $array;
        }


    }



}
