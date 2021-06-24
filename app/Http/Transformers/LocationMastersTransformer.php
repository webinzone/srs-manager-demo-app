<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\LocationMaster;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class LocationMastersTransformer
{

    public function transformLocationMasters (Collection $location_masters, $total)
    {
        $array = array();
        foreach ($location_masters as $location_master) {
            $array[] = self::transformLocationMaster($location_master);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformLocationMaster (LocationMaster $location_master = null)
    {
        if ($location_master) {

            $array = [
                'id' => (int) $location_master->id,
                'location_id' => e($location_master->location_id),
                'master_name' => e($location_master->master_name),
                'address' => e($location_master->address),
                'email' => e($location_master->email),
                'ph' => e($location_master->ph),
                'fax' => e($location_master->fax),
                'web_id' => e($location_master->web_id),
                'created_at' => e($location_master->created_at),
                'actions' => view('location_masters/datatables_actions', compact('location_master'))->render() 
                
            ];


            return $array;
        }


    }



}
