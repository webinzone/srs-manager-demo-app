<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\StaffRoaster;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class StaffRoastersTransformer
{

    public function transformStaffRoasters (Collection $staff_roasters, $total)
    {
        $array = array();
        foreach ($staff_roasters as $staff_roaster) {
            $array[] = self::transformStaffRoaster($staff_roaster);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformStaffRoaster (StaffRoaster $staff_roaster = null)
    {
        if ($staff_roaster) {

            $array = [
                'id' => (int) $staff_roaster->id,
                's_date' => e(date('d-m-Y', strtotime($staff_roaster->s_date))),
            
                'total' => e($staff_roaster->total),
                'created_at' => e(date('d-m-Y', strtotime($staff_roaster->created_at))),
                'actions' => view('staff_roasters/datatables_actions', compact('staff_roaster'))->render() 
                
            ];


            return $array;
        }


    }



}
