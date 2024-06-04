<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;


class UserController extends Controller
{
    public function generate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Generate PDF using DomPDF
        $pdf = PDF::loadView('pdf', ['record' => $user]);

        // Return PDF as download
        // Return PDF for printing
        return $pdf->stream($user->name . '.pdf');
    }


}
