<?php
namespace App\Presenters;

/**
 * Class AccessoryPresenter
 * @package App\Presenters
 */
class ReferralPresenter extends Presenter
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
                "field" => "con_name",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Name of person giving this consent')
            ],[
                "field" => "refer_name",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Name of person being referred')
            ],[
                "field" => "rep_name",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Representative Name')
            ],[
                "field" => "relation",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Relationship')
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
        return (string) link_to_route('referrals.show', $this->r_name, $this->id);
    }

    /**
     * Url to view this item.
     * @return string
     */
    public function viewUrl()
    {
        return route('referrals.show', $this->id);
    }

    public function name()
    {
        return $this->model->r_name;
    }
}
