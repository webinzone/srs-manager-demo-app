<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\Evngshift;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class EvngshiftsTransformer
{

    public function transformEvngshifts (Collection $evngshifts, $total)
    {
        $array = array();
        foreach ($evngshifts as $evngshift) {
            $array[] = self::transformEvngshift($evngshift);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformEvngshift (Evngshift $evngshift = null)
    {
        if ($evngshift) {

            $array = [
                'id' => (int) $evngshift->id,
                'eveng_date' => e(date('d-m-Y', strtotime($evngshift->eveng_date))),

                'evng_staff' => e($evngshift->evng_staff),
                'mng_staff' => e($evngshift->mng_staff),
                
                'created_at' => e(date('d-m-Y', strtotime($evngshift->created_at))),
                'actions' => view('evngshifts/datatables_actions', compact('evngshift'))->render() 
                
            ];


            return $array;
        }


    }



}
