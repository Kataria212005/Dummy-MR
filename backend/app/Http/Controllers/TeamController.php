<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function show()
    {
        // For core team
        $core = [];
        $coreImages = File::files(public_path('assets/images/core'));
        foreach ($coreImages as $file) {
            $filename = $file->getFilename();
            $name = pathinfo($filename, PATHINFO_FILENAME); // e.g., anishka_sharma
            $displayName = ucwords(str_replace(['_', '-'], ' ', $name));
            $core[] = [
                'name' => $displayName,
                'image' => "assets/images/core/$filename"
            ];
        }
        // For volunteers
        $volunteers = [];
        $volunteerImages = File::files(public_path('assets/images/volunteer'));
        foreach ($volunteerImages as $file) {
            $filename = $file->getFilename();
            $name = pathinfo($filename, PATHINFO_FILENAME);
            $displayName = ucwords(str_replace(['_', '-'], ' ', $name));
            $volunteers[] = [
                'name' => $displayName,
                'image' => "assets/images/volunteer/$filename"
            ];
        }
        return view('ourTeam', compact('core', 'volunteers'));
    }
}
