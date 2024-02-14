<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
public function ip(Request $request)
    {
        // $ip = $request->ip();
        // $reader = new Reader(base_path('ipb_live_exrzt3laUS8fR0SXs48y3DJmpMD3f04cTAjKANZb'));
        // $record = $reader->city($request->ip());
        
        // $city = $record->city->name;
        // $country = $record->country->name;
    
        // return view('welcome', compact('ip', 'city', 'country')); 
    }
trait CreatesApplication
{
    /**
     * Creates the application.
     */
    public function createApplication(): Application
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
