<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function show($moduleNumber)
    {
        // check if the view exists
        if (!view()->exists("modules.module$moduleNumber")) {
            abort(404);
        }

        return view("modules.module$moduleNumber", [
            'moduleNumber' => $moduleNumber,
        ]);
    }
}
