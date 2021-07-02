<?php
namespace App\Presenters;

/**
 * Class AccessoryPresenter
 * @package App\Presenters
 */
class SrsStaffPresenter extends Presenter
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
                "field" => "name",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Name')
            ],[
                "field" => "address",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Address')
            ],[
                "field" => "ph",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Phone Number')
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
        return (string) link_to_route('srs_staffs.show', $this->company_name, $this->id);
    }

    /**
     * Url to view this item.
     * @return string
     */
    public function viewUrl()
    {
        return route('srs_staffs.show', $this->id);
    }

    public function name()
    {
        return $this->model->company_name;
    }
}
