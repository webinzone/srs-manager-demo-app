<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\Roster;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class RostersTransformer
{

    public function transformRosters (Collection $rosters, $total)
    {
        $array = array();
        foreach ($rosters as $roster) {
            $array[] = self::transformRoster($roster);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformRoster (Roster $roster = null)
    {
        if ($roster) {

            $array = [
                'id' => (int) $roster->id,
                'p_from' => e($roster->p_from),

                'p_to' => e($roster->p_to),
                
                'created_at' => e(date('d-m-Y', strtotime($roster->created_at))),
                'actions' => view('rosters/datatables_actions', compact('roster'))->render() 
                
            ];


            return $array;
        }


    }



}
