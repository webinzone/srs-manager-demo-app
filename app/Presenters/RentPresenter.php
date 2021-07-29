<?php
namespace App\Presenters;

/**
 * Class AccessoryPresenter
 * @package App\Presenters
 */
class RentPresenter extends Presenter
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
                "title" => trans('Resident Name')
            ],[
                "field" => "adm_date",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Admission Date')
            ],[
                "field" => "tof",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Payment Method')
            ],[
                "field" => "status",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Paid status')
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
        return (string) link_to_route('rents.show', $this->res_name, $this->id);
    }

    /**
     * Url to view this item.
     * @return string
     */
    public function viewUrl()
    {
        return route('rents.show', $this->id);
    }

    public function name()
    {
        return $this->model->res_name;
    }
}
