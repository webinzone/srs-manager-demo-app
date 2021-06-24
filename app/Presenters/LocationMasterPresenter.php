<?php
namespace App\Presenters;

/**
 * Class AccessoryPresenter
 * @package App\Presenters
 */
class LocationMasterPresenter extends Presenter
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
                "field" => "location_id",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Location Id')
            ],[
                "field" => "master_name",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Master Name')
            ],[
                "field" => "address",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Address')
            ],[
                "field" => "email",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Email')
            ],[
                "field" => "ph",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Phone Number')     
            ],[
                "field" => "fax",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Fax')
            ],[
                "field" => "web_id",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Web Id')
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
        return (string) link_to_route('location_masters.show', $this->location_id, $this->id);
    }

    /**
     * Url to view this item.
     * @return string
     */
    public function viewUrl()
    {
        return route('location_masters.show', $this->id);
    }

    public function name()
    {
        return $this->model->location_id;
    }
}
