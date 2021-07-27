<?php
namespace App\Presenters;

/**
 * Class AccessoryPresenter
 * @package App\Presenters
 */
class IncidentPresenter extends Presenter
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
                "field" => "i_date",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Incident Date')
            ],[
                "field" => "i_time",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Incident Time')
            ],[
                "field" => "s_name",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Staff Name')
            ],[
                "field" => "p_name",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Person effected in incident')
            ],[
                "field" => "created_at",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Created Date')
            ],[
                "field" => "actions_taken",
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
        return (string) link_to_route('incidents.show', $this->f_name, $this->id);
    }

    /**
     * Url to view this item.
     * @return string
     */
    public function viewUrl()
    {
        return route('incidents.show', $this->id);
    }

    public function name()
    {
        return $this->model->f_name;
    }
}
