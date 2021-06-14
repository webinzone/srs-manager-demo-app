<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\ClientDetail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class ClientDetailsTransformer
{

    public function transformClientDetails (Collection $client_details, $total)
    {
        $array = array();
        foreach ($client_details as $client_detail) {
            $array[] = self::transformClientDetail($client_detail);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformClientDetail (ClientDetail $client_detail = null)
    {
        if ($client_detail) {

            $array = [
                'id' => (int) $client_detail->id,
                'fname' => e($client_detail->fname),
                'mname' => e($client_detail->mname),
                'lname' => e($client_detail->lname),
                'address' => e($client_detail->address),
                'dob' => e($client_detail->dob),
                'cob' => e($client_detail->cob),
                'age' => e($client_detail->age),
                'gender' => e($client_detail->gender),
                'religion' => e($client_detail->religion),
                'l_known' => e($client_detail->l_known),
                'ph' => e($client_detail->ph),
                'medicard_no' => e($client_detail->medicard_no),
                'medicard_orderno' => e($client_detail->medicard_orderno),
                'pension_no' => e($client_detail->pension_no),
                'insurance_no' => e($client_detail->insurance_no),
                'insu_compny' => e($client_detail->insu_compny),
                'likes' => e($client_detail->likes),
                'dislikes' => e($client_detail->dislikes),
                'hobies' => e($client_detail->hobies),
                'created_at' => e($client_detail->created_at),
                'actions' => view('clients/datatables_actions', compact('client_detail'))->render()                 
            ];


            return $array;
        }


    }



}
