<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\GpDetail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class GpDetailsTransformer
{

    public function transformGpDetails (Collection $gp_details, $total)
    {
        $array = array();
        foreach ($gp_details as $gp_detail) {
            $array[] = self::transformGpDetail($gp_detail);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformGpDetail (GpDetail $gp_detail = null)
    {
        if ($gp_detail) {

            $array = [
                'id' => (int) $gp_detail->id,
                'res_name' => e($gp_detail->res_name),
                'dob' => e($gp_detail->dob),

                'room' => e($gp_detail->room),
                'bed' => e($gp_detail->bed),
                
                'created_at' => e(date('d-m-Y', strtotime($gp_detail->created_at))),
                'actions' => view('gp_details/datatables_actions', compact('gp_detail'))->render() 
                
            ];


            return $array;
        }


    }



}
