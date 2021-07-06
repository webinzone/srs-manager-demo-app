<?php
namespace App\Presenters;

/**
 * Class AccessoryPresenter
 * @package App\Presenters
 */
class RoomDetailPresenter extends Presenter
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
                "field" => "room_no",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Room No')
            ],[
                "field" => "type",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Room Type')
            ],[
                "field" => "client_type",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Client Type')
            ],[
                "field" => "client_id",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Client Id')
            ],[
                "field" => "status",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Status')
            ],[
                "field" => "beds_no",
                "searchable" => true,
                "sortable" => true,
                "visible" => true,
                "title" => trans('Beds No')     
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
        return (string) link_to_route('room_details.show', $this->company_name, $this->id);
    }

    /**
     * Url to view this item.
     * @return string
     */
    public function viewUrl()
    {
        return route('room_details.show', $this->id);
    }

    public function name()
    {
        return $this->model->company_name;
    }
}
