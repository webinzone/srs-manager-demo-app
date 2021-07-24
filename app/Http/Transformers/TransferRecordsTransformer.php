<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\TransferRecord;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class TransferRecordsTransformer
{

    public function transformTransferRecords (Collection $transfer_records, $total)
    {
        $array = array();
        foreach ($transfer_records as $transfer_record) {
            $array[] = self::transformTransferRecord($transfer_record);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformTransferRecord (TransferRecord $transfer_record = null)
    {
        if ($transfer_record) {

            $array = [
                'id' => (int) $transfer_record->id,
                'user_name' => e($transfer_record->user_name),
              
                'from' => e($transfer_record->from),
                'to' => e($transfer_record->to),
                
                'reason' => e($transfer_record->reason),
               
                'created_at' => e(date('d-m-Y', strtotime($transfer_record->created_at))),
                'actions' => view('transfer_records/datatables_actions', compact('transfer_record'))->render() 
                
            ];


            return $array;
        }


    }



}
