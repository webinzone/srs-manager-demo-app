<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class AppointmentsTransformer
{

    public function transformAppointments (Collection $appointments, $total)
    {
        $array = array();
        foreach ($appointments as $appointment) {
            $array[] = self::transformAppointment($appointment);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformAppointment (Appointment $appointment = null)
    {
        if ($appointment) {

            $array = [
                'id' => (int) $appointment->id,
                'res_name' => e($appointment->res_name),
                'app_date' => e(date('d-m-Y', strtotime($appointment->app_date))),
                'app_time' => e($appointment->app_time),
                'app_with' => e($appointment->app_with),
                'created_at' => e(date('d-m-Y', strtotime($appointment->created_at))),
               
                'actions' => view('appointments/datatables_actions', compact('appointment'))->render() 
                
            ];


            return $array;
        }


    }



}
