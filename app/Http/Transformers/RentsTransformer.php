<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\Rent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class RentsTransformer
{

    public function transformRents (Collection $rents, $total)
    {
        $array = array();
        foreach ($rents as $rent) {
            $array[] = self::transformRent($rent);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformRent (Rent $rent = null)
    {
        if ($rent) {

            $array = [
                'id' => (int) $rent->id,
                'res_name' => e($rent->res_name),
                'adm_date' => e(date('d-m-Y', strtotime($rent->adm_date))),
                'tof' => e($rent->tof),
                'status' => e($rent->status),

                'created_at' => e(date('d-m-Y', strtotime($rent->created_at))),
                'actions' => view('rents/datatables_actions', compact('rent'))->render() 
                
            ];


            return $array;
        }


    }



}
