<?php

namespace App\Presenters;

use App\Helpers\Helper;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

/**
 * Class UserPresenter
 * @package App\Presenters
 */
class UserPresenter extends Presenter
{


    /**
     * Json Column Layout for bootstrap table
     * @return string
     */
    public static function dataTableLayout()
    {
        $layout = [
            [
                "field" => "checkbox",
                "checkbox" => true
            ],
            [
                "field" => "id",
                "searchable" => false,
                "sortable" => true,
                "switchable" => true,
                "title" => trans('general.id'),
                "visible" => false
            ],
            
            [
                "field" => "name",
                "searchable" => true,
                "sortable" => true,
                "title" => trans('admin/users/table.name'),
                "visible" => true,
                "formatter" => "usersLinkFormatter"
            ],
          
            [
                "field" => "username",
                "searchable" => true,
                "sortable" => true,
                "switchable" => true,
                "title" => trans('admin/users/table.username'),
                "visible" => true,
                "formatter" => "usersLinkFormatter"
            ],
           
            [
                "field" => "location",
                "searchable" => true,
                "sortable" => true,
                "switchable" => true,
                "title" => trans('admin/users/table.location'),
                "visible" => true
            ],            
           
            
           
            [
                "field" => "activated",
                "searchable" => false,
                "sortable" => true,
                "switchable" => true,
                "title" => trans('general.login_enabled'),
                "visible" => true,
                'formatter' => 'trueFalseFormatter'
            ],
            [
                "field" => "created_at",
                "searchable" => true,
                "sortable" => true,
                "switchable" => true,
                "title" => trans('general.created_at'),
                "visible" => false,
                'formatter' => 'dateDisplayFormatter'
            ],
           
            [
                "field" => "actions",
                "searchable" => false,
                "sortable" => false,
                "switchable" => false,
                "title" => trans('table.actions'),
                "visible" => true,
                "formatter" => "usersActionsFormatter",
            ]
        ];

        return json_encode($layout);
    }


    public function emailLink()
    {
        if ($this->email) {
            return '<a href="mailto:'.$this->email.'">'.$this->email.'</a>'
                .'<a href="mailto:'.$this->email.'" class="hidden-xs hidden-sm"><i class="fa fa-envelope"></i></a>';
        }
        return '';
    }
    /**
     * Returns the user full name, it simply concatenates
     * the user first and last name.
     *
     * @return string
     */
    public function fullName()
    {
        return html_entity_decode($this->first_name.' '.$this->last_name, ENT_QUOTES | ENT_XML1, 'UTF-8');
    }

    /**
     * Standard accessor.
     * @TODO Remove presenter::fullName() entirely?
     * @return string
     */
    public function name()
    {
        return $this->fullName();
    }
    /**
     * Returns the user Gravatar image url.
     *
     * @return string
     */
    public function gravatar()
    {


        if ($this->avatar) {
            return Storage::disk('public')->url('avatars/'.e($this->avatar));
        }

        if (Setting::getSettings()->load_remote=='1') {
            if ($this->model->gravatar!='') {
                $gravatar = md5(strtolower(trim($this->model->gravatar)));
                return "//gravatar.com/avatar/".$gravatar;
            } elseif ($this->email!='') {
                $gravatar = md5(strtolower(trim($this->email)));
                return "//gravatar.com/avatar/".$gravatar;
            }
        }

        // Set a fun, gender-neutral default icon
        return url('/').'/img/default-sm.png';

    }

    /**
     * Formatted url for use in tables.
     * @return string
     */
    public function nameUrl()
    {
        return (string) link_to_route('users.show', $this->fullName(), $this->id);
    }

    /**
     * Url to view this item.
     * @return string
     */
    public function viewUrl()
    {
        return route('users.show', $this->id);
    }

    public function glyph()
    {
        return '<i class="fa fa-user" aria-hidden="true"></i>';
    }
}
