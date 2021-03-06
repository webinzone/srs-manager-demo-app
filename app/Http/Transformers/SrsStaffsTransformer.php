<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\SrsStaff;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class SrsStaffsTransformer
{

    public function transformSrsStaffs (Collection $srs_staffs, $total)
    {
        $array = array();
        foreach ($srs_staffs as $srs_staff) {
            $array[] = self::transformSrsStaff($srs_staff);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformSrsStaff (SrsStaff $srs_staff = null)
    {
        if ($srs_staff) {

            $array = [
                'id' => (int) $srs_staff->id,
                'name' => e($srs_staff->name),
                'address' => e($srs_staff->address),
                'ph' => e($srs_staff->ph),
                'created_at' => e(date('d-m-Y', strtotime($srs_staff->created_at))),
                'actions' => view('srs_staffs/datatables_actions', compact('srs_staff'))->render() 
                
            ];


            return $array;
        }


    }



}
