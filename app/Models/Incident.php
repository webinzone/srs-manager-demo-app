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
class Incident extends SnipeModel
{
    protected $presenter = 'App\Presenters\IncidentPresenter';
    use Presentable;

    
    protected $table = 'incidents';
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


    protected $searchableAttributes = ['i_date', 'i_time', 's_name', 's_sign', 'p_name', 'place', 'doctor', 'nok', 'case_mgr', 'management', 'dhhs', 'n_date', 'n_time','res_hos','i_details', 'actions', 'action_date', 'o_det', 'i_prescribed', 'police_noti','sp_update','reported', 'auth_name', 'rep_date', 'rep_time'];

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
    protected $fillable = [ 's_name',  
        'p_name'
        
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
