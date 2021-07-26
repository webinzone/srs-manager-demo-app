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
class Referral2 extends SnipeModel
{
    protected $presenter = 'App\Presenters\Referral2Presenter';
    use Presentable;

    
    protected $table = 'referrals2';
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


    protected $searchableAttributes = ['client_id', 'med1', 'med1_det', 'med2', 'med2_det', 'med3', 'med3_det', 'med4', 'med4_det', 'med5', 'med5_det', 'med6', 'med6_det', 'med7', 'med7_det', 'med8', 'med8_det', 'med9', 'med9_det', 'med10', 'med10_det', 'med11', 'med11_det', 'med12', 'med12_det', 'med13', 'med13_det', 'med14', 'med14_det', 'med15', 'med15_det', 'med16', 'med16_det', 'med17', 'med17_det', 'med18', 'med18_det', 'p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7','p8', 'p9', 'p10', 'a1', 'a2', 'a3', 'a_comments', 'public_trans', 'app_keep', 'social_activity', 'hobbies', 'case_name', 'case_org', 'case_email', 'case_ph', 'case_addr', 'serv_per', 'serv_org', 'serv_adr', 'serv_email', 'serv_ph', 'addserv_per', 'addserv_org', 'addserv_adr', 'addserv_email', 'addserv_ph', 'other_relev', 'rel_name', 'rel_pos', 'rel_org', 'rel_date'];

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
