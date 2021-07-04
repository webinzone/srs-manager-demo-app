<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\ResidentAgreement;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class ResidentAgreementsTransformer
{

    public function transformResidentAgreements (Collection $resident_agreements, $total)
    {
        $array = array();
        foreach ($resident_agreements as $resident_agreement) {
            $array[] = self::transformResidentAgreement($resident_agreement);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformResidentAgreement (ResidentAgreement $resident_agreement = null)
    {
        if ($resident_agreement) {

            $array = [
                'id' => (int) $resident_agreement->id,
                'r_name' => e($resident_agreement->r_name),
                'room_no' => e($resident_agreement->room_no),
                'guardian' => e($resident_agreement->guardian),
                'created_at' => e($resident_agreement->created_at),
                'actions' => view('resident_agreements/datatables_actions', compact('resident_agreement'))->render() 
                
            ];


            return $array;
        }


    }



}
