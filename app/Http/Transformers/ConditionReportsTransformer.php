<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\ConditionReport;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class ConditionReportsTransformer
{

    public function transformConditionReports (Collection $condition_reports, $total)
    {
        $array = array();
        foreach ($condition_reports as $condition_report) {
            $array[] = self::transformConditionReport($condition_report);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformConditionReport (ConditionReport $condition_report = null)
    {
        if ($condition_report) {

            $array = [
                'id' => (int) $condition_report->id,
                'res_name' => e($condition_report->res_name),

                'room' => e($condition_report->room),
                'items' => e($condition_report->items),
                'clean' => e($condition_report->clean),
                
                'created_at' => e($condition_report->created_at),
                'actions' => view('condition_reports/datatables_actions', compact('condition_report'))->render() 
                
            ];


            return $array;
        }


    }



}
