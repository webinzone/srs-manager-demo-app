<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\Referral;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class ReferralsTransformer
{

    public function transformReferrals (Collection $referrals, $total)
    {
        $array = array();
        foreach ($referrals as $referral) {
            $array[] = self::transformReferral($referral);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformReferral (Referral $referral = null)
    {
        if ($referral) {

            $array = [
                'id' => (int) $referral->id,
                'cfname' => e($referral->cfname),
                'con_name' => e($referral->con_name),
                'rep_name' => e($referral->rep_name),
                'relation' => e($referral->relation),
                'created_at' => e(date('d-m-Y', strtotime($referral->created_at))),
                'actions' => view('referrals/datatables_actions', compact('referral'))->render() 
                
            ];


            return $array;
        }


    }



}
