<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class BookingsTransformer
{

    public function transformBookings (Collection $bookings, $total)
    {
        $array = array();
        foreach ($bookings as $booking) {
            $array[] = self::transformBooking($booking);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformBooking (Booking $booking = null)
    {
        if ($booking) {

            $array = [
                'id' => (int) $booking->id,
                'c_name' => e($booking->c_name),
                'b_from' => e($booking->b_from),
                'b_to' => e($booking->b_to),
                'bed' => e($booking->bed),
               
                'created_at' => e($booking->created_at),
                'actions' => view('bookings/datatables_actions', compact('booking'))->render() 
                
            ];


            return $array;
        }


    }



}
