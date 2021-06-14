<?php
namespace App\Presenters;

/**
 * Class AccessoryPresenter
 * @package App\Presenters
 */
class ClientDetailPresenter extends Presenter
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
                "title" => trans('First name')
            ],[
                "field" => "mname",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Middle name')
            ],[
                "field" => "lname",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Last name')
            ],[
                "field" => "address",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Address')
            ],[
                "field" => "dob",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Date of birth')
            ],[
                "field" => "cob",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Country of birth')
            ],[
                "field" => "age",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Age')
            ],[
                "field" => "gender",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Gender')
            ],[
                "field" => "religion",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Religion')
            ],[
                "field" => "l_known",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Languages Known')
            ],[
                "field" => "ph",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Phone number')
            ],[
                "field" => "medicard_no",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Medicare card number')
            ],[
                "field" => "medicard_orderno",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Medicare card order number')
            ],[
                "field" => "pension_no",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Pension card number')
            ],[
                "field" => "insurance_no",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Insurance card number if any')
            ],[
                "field" => "insu_compny",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Insurance company name')
            ],[
                "field" => "likes",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Likes')
            ],[
                "field" => "dislikes",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Dislikes')
            ],[
                "field" => "hobies",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Hobbies')
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
        return (string) link_to_route('client_details.show', $this->f_name, $this->id);
    }

    /**
     * Url to view this item.
     * @return string
     */
    public function viewUrl()
    {
        return route('client_details.show', $this->id);
    }

    public function name()
    {
        return $this->model->f_name;
    }
}
