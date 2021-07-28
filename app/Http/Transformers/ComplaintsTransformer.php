<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\Complaint;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class ComplaintsTransformer
{

    public function transformComplaints (Collection $complaints, $total)
    {
        $array = array();
        foreach ($complaints as $complaint) {
            $array[] = self::transformComplaint($complaint);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformComplaint (Complaint $complaint = null)
    {
        if ($complaint) {

            $array = [
                'id' => (int) $complaint->id,
                'f_name' => e($complaint->f_name),
                'user_name' => e($complaint->user_name),
                'com_details' => e($complaint->com_details),
                'com_nature' => e($complaint->com_nature),
            
                'created_at' => e(date('d-m-Y', strtotime($complaint->created_at))),
                'actions' => view('complaints/datatables_actions', compact('complaint'))->render() 
                
            ];


            return $array;
        }


    }



}
