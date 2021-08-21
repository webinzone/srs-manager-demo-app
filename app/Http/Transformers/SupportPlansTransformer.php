<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\SupportPlan;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class SupportPlansTransformer
{

    public function transformSupportPlans (Collection $support_plans, $total)
    {
        $array = array();
        foreach ($support_plans as $support_plan) {
            $array[] = self::transformSupportPlan($support_plan);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformSupportPlan (SupportPlan $support_plan = null)
    {
        if ($support_plan) {

            $array = [
                'id' => (int) $support_plan->id,
                'user_name' => e($support_plan->user_name),
                'adm_date' => e(date('d-m-Y', strtotime($support_plan->adm_date))),
                'cons' => e($support_plan->cons),
                'created_at' => e(date('d-m-Y', strtotime($support_plan->created_at))),
                'actions' => view('support_plans/datatables_actions', compact('support_plan'))->render() 
                
            ];


            return $array;
        }


    }



}
