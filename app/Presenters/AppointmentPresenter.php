<?php
namespace App\Presenters;

/**
 * Class AccessoryPresenter
 * @package App\Presenters
 */
class AppointmentPresenter extends Presenter
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
                "field" => "res_name",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Name of the resident')
            ],[
                "field" => "app_date",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Appointment Date')
            ],[
                "field" => "app_time",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Time')
            ],[
                "field" => "app_with",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Appointment with')
            ],[
                "field" => "status",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Status')
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
        return (string) link_to_route('appointments.show', $this->company_name, $this->id);
    }

    /**
     * Url to view this item.
     * @return string
     */
    public function viewUrl()
    {
        return route('appointments.show', $this->id);
    }

    public function name()
    {
        return $this->model->company_name;
    }
}
