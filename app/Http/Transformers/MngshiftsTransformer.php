<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\Mngshift;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class MngshiftsTransformer
{

    public function transformMngshifts (Collection $mngshifts, $total)
    {
        $array = array();
        foreach ($mngshifts as $mngshift) {
            $array[] = self::transformMngshift($mngshift);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformMngshift (Mngshift $mngshift = null)
    {
        if ($mngshift) {

            $array = [
                'id' => (int) $mngshift->id,
                'mng_date' => e(date('d-m-Y', strtotime($mngshift->mng_date))),
                'mng_staff' => e($mngshift->mng_staff),
                'evng_staff' => e($mngshift->evng_staff),
                'created_at' => e(date('d-m-Y', strtotime($mngshift->created_at))),
                'actions' => view('mngshifts/datatables_actions', compact('mngshift'))->render() 
                
            ];


            return $array;
        }


    }



}
