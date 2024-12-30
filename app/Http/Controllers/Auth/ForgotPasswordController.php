<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;


class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
{
    try {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            Log::info('Email sent successfully to: ' . $request->email);
            return response()->json(['message' => __($status)], 200);
        }

        Log::warning('Failed to send email to: ' . $request->email);
        return response()->json(['message' => __($status)], 400);
    } catch (\Exception $e) {
        Log::error('Mail Error: ' . $e->getMessage());
        return response()->json(['error' => 'Unable to send email. Please try again later bro.'], 500);
    }
}
}
