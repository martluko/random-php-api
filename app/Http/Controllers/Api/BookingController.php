<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Resources\BookingResource;
use Illuminate\Support\Facades\Validator;
use App\Models\UserHistory;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    // Show all bookings
    public function index() {
        return BookingResource::collection(Booking::all());
    }

    // Store a new booking
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'comment' => 'nullable|string',
            'date_time' => 'required|date|after_or_equal:today',
            'user_id' => 'required|exists:users,id',
            'professional_id' => 'required|exists:users,id',
            'payment_id' => 'nullable|exists:payments,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $booking = Booking::create($validator->validated());
        return new BookingResource($booking);
    }

    // Show a single booking
    public function show(Booking $booking) {
        return new BookingResource($booking);
    }

    // Update a booking
    public function update(Request $request, Booking $booking) {
        $validator = Validator::make($request->all(), [
            'comment' => 'nullable|string',
            'date_time' => 'required|date|after_or_equal:today',
            'user_id' => 'required|exists:users,id',
            'professional_id' => 'required|exists:users,id',
            'payment_id' => 'nullable|exists:payments,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $booking->update($validator->validated());
        return new BookingResource($booking);
    }

    // Delete a booking
    public function destroy(Booking $booking) {
        $booking->delete();
        return response()->json(null, 204);
    }
    
    public function registerVisit(Request $request) {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'professional_id' => 'required|exists:users,id',
            'payment_id' => 'required|exists:payments,id',
        ]);

        try {
            DB::beginTransaction();

            // Assign current date and time for booking
            $bookingDateTime = now();

            // Create Booking
            $booking = Booking::create([
                'user_id' => $request->user_id,
                'professional_id' => $request->professional_id,
                'payment_id' => $request->payment_id,
                'date_time' => $bookingDateTime,
                // other fields like 'comment' can be added if needed
            ]);

            // Create User History (if needed)
            // to log visit comments, etc.
            UserHistory::create([
                'user_id' => $request->user_id,
                'professional_id' => $request->professional_id,
                'booking_id' => $booking->id,
                'title' => 'Consultation Visit',
                // other fields like 'comment' can be added if needed
            ]);

            DB::commit();

            return response()->json(['message' => 'Visit registered successfully', 'booking' => $booking], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
