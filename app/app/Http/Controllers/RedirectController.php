<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use App\Models\Click;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function __invoke(string $code): RedirectResponse
    {
        $shortUrl = ShortUrl::where('short_code', $code)->firstOrFail();

        Click::create([
            'short_url_id' => $shortUrl->id,
            'ip_address' => request()->ip(),
        ]);

        return redirect()->to($shortUrl->original_url);
    }
}
