<?php
namespace App\Presenters;

/**
 * Class AccessoryPresenter
 * @package App\Presenters
 */
class CompanyMasterPresenter extends Presenter
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
                "field" => "company_id",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Company ID')
            ],[
                "field" => "company_name",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Company Name')
            ],[
                "field" => "address",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Address')
            ],[
                "field" => "suburb",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Suburb')
            ],[
                "field" => "state",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('State')
            ],[
                "field" => "post_code",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Post Code')
            ],[
                "field" => "ph",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Phone Number')     
            ],[
                "field" => "email",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Email')
            ],[
                "field" => "fax",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Fax')
            ],[
                "field" => "web",
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
        return (string) link_to_route('company_masters.show', $this->company_name, $this->id);
    }

    /**
     * Url to view this item.
     * @return string
     */
    public function viewUrl()
    {
        return route('company_masters.show', $this->id);
    }

    public function name()
    {
        return $this->model->company_name;
    }
}
