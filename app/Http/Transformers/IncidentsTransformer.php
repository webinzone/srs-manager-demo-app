<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\Incident;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class IncidentsTransformer
{

    public function transformIncidents (Collection $incidents, $total)
    {
        $array = array();
        foreach ($incidents as $incident) {
            $array[] = self::transformIncident($incident);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformIncident (Incident $incident = null)
    {
        if ($incident) {

            $array = [
                'id' => (int) $incident->id,
                'category' => e($incident->category),

                'i_date' => e(date('d-m-Y', strtotime($incident->i_date))),
                'i_time' => e($incident->i_time),
                'p_name' => e($incident->p_name),
                
                'created_at' => e(date('d-m-Y', strtotime($incident->created_at))),
                'actions_taken' => view('incidents/datatables_actions', compact('incident'))->render() 
                
            ];


            return $array;
        }


    }



}
