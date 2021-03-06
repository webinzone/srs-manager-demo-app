<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\ProgressNote;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class ProgressNotesTransformer
{

    public function transformProgressNotes (Collection $progress_notes, $total)
    {
        $array = array();
        foreach ($progress_notes as $progress_note) {
            $array[] = self::transformProgressNote($progress_note);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformProgressNote (ProgressNote $progress_note = null)
    {
        if ($progress_note) {

            $array = [
                'id' => (int) $progress_note->id,
                'res_name' => e($progress_note->res_name),
                'staff' => e($progress_note->staff),
                'room' => e($progress_note->room),
                

                'created_at' => e(date('d-m-Y', strtotime($progress_note->created_at))),
                'actions' => view('progress_notes/datatables_actions', compact('progress_note'))->render() 
                
            ];


            return $array;
        }


    }



}
