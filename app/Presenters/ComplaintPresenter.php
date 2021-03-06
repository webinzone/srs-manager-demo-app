<?php
namespace App\Presenters;

/**
 * Class AccessoryPresenter
 * @package App\Presenters
 */
class ComplaintPresenter extends Presenter
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
                "visible" => true
            ],[
                "field" => "f_name",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Facility Name')
            ],[
                "field" => "user_name",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Name of Person Commenting')
            ],[
                "field" => "com_details",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Complaint Details')
            ],[
                "field" => "com_nature",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Nature of Complaint')
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
        return (string) link_to_route('complaints.show', $this->f_name, $this->id);
    }

    /**
     * Url to view this item.
     * @return string
     */
    public function viewUrl()
    {
        return route('complaints.show', $this->id);
    }

    public function name()
    {
        return $this->model->f_name;
    }
}
