<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Resources\BookingResource;
use Illuminate\Support\Facades\Validator;

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
}
