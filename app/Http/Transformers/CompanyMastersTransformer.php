<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\CompanyMaster;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class CompanyMastersTransformer
{

    public function transformCompanyMasters (Collection $company_masters, $total)
    {
        $array = array();
        foreach ($company_masters as $company_master) {
            $array[] = self::transformCompanyMaster($company_master);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformCompanyMaster (CompanyMaster $company_master = null)
    {
        if ($company_master) {

            $array = [
                'id' => (int) $company_master->id,
                'company_id' => e($company_master->company_id),                
                'company_name' => e($company_master->company_name),
                'address' => e($company_master->address),
                'suburb' => e($company_master->suburb),
                
                'created_at' => e(date('d-m-Y', strtotime($company_master->created_at))),
                'actions' => view('company_masters/datatables_actions', compact('company_master'))->render() 
                
            ];


            return $array;
        }


    }



}
