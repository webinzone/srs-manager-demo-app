<?php
namespace App\Presenters;

/**
 * Class AccessoryPresenter
 * @package App\Presenters
 */
class ClientUserPresenter extends Presenter
{
    /**
     * Json Column Layout for bootstrap table
     * @return string
     */
    public static function dataTableLayout()
    {
        $layout = [
            [
                "field" => "id",
                "searchable" => false,
                "sortable" => true,
                "switchable" => true,
                "title" => trans('id'),
                "visible" => false
            ],[
                "field" => "fname",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Name')
            ],[
                "field" => "email",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Email')
            ],[
                "field" => "dob",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Date of Birth')
            ],[
                "field" => "ph",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Phone Number')     
            ],[
                "field" => "role",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Role')
            ],[
                "field" => "username",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Username')
            ],[
                "field" => "password",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Password')
            ],[
                "field" => "created_at",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Created Date')
            ],[
                "field" => "actions",
                "searchable" => false,
                "sortable" => false,
                "title" => trans('table.actions'),
                "visible" => true
            ]
                
        ];

        return json_encode($layout);
    }


    /**
     * Pregenerated link to this accessories view page.
     * @return string
     */
    public function nameUrl()
    {
        return (string) link_to_route('client_users.show', $this->f_name, $this->id);
    }

    /**
     * Url to view this item.
     * @return string
     */
    public function viewUrl()
    {
        return route('client_users.show', $this->id);
    }

    public function name()
    {
        return $this->model->f_name;
    }
}
