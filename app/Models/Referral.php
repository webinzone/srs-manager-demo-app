<?php
namespace App\Models;

use App\Models\Traits\Acceptable;
use App\Models\Traits\Searchable;
use App\Presenters\Presentable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Watson\Validating\ValidatingTrait;

/**
 * Model for Accessories.
 *
 * @version    v1.0
 */
class Referral extends SnipeModel
{
    protected $presenter = 'App\Presenters\ReferralPresenter';
    use Presentable;

    
    protected $table = 'referrals';
    protected $casts = [
        'requestable' => 'boolean'
    ];


    use Acceptable;
    
    /**
     * The attributes that should be included when searching the model.
     * 
     * @var array
     */
    use Searchable;


    protected $searchableAttributes = ['con_name', 'refer_name', 'r_date', 'rep_name', 'relation', 'email', 'ph', 'reason', 'appr_becoz', 'ref_date', 'ref_posi', 'ref_agency', 'ref_email', 'ref_ph', 'cfname', 'csurname', 'cdob', 'cgender', 'creligion', 'cph', 'cemail', 'caddress', 'csrs_name', 'csrs_ph', 'csrs_insu', 'csrs_refno', 'nok_name', 'nok_relation', 'nok_address', 'nok_email', 'nok_ph', 'gp_name', 'gp_address', 'gp_ph', 'gp_fax', 'gp_email', 'gua_refno', 'gua_name', 'gua_addr', 'gua_email', 'gua_ph', 'ad_name', 'ad_refno', 'ad_addr', 'ad_email', 'ad_ph', 'pen_type', 'pen_refno', 'pen_medino', 'pen_mediexp', 'pen_taxi', 'pen_taxiexp', 'medi_drugname', 'medi_dose', 'medi_freq', 'medi_duration', 'medi_lasttaken', 'c_medi', 'c_ownmedi', 'c_medisideeffect', 'ph_status', 'cogi_status', 'dis_primary', 'dis_casemngr', 'dis_org', 'dis_email', 'dis_ph', 'ment_status', 'ment_casemngr', 'ment_org', 'ment_email', 'ment_ph', 'behav_harm', 'behav_details', 'triger', 'company_id', 'location_id'];

    /**
     * The relations and their attributes that should be included when searching the model.
     * 
     * @var array
     */
   
    /**
    * Accessory validation rules
    */
   


    /**
    * Whether the model should inject it's identifier to the unique
    * validation rules before attempting validation. If this property
    * is not set in the model it will default to true.
    *
    * @var boolean
    */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'con_name'
    ];



   

    /**
     * Sets the requestable attribute on the accessory
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v4.0]
     * @return void
     */
    public function setRequestableAttribute($value)
    {
        if ($value == '') {
            $value = null;
        }
        $this->attributes['requestable'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
        return;
  }
}
