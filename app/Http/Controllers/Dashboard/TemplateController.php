<?php

namespace App\Http\Controllers\Dashboard;
use Exception;
use App\Models\Template;

use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Services\TemplateService;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller {

    public function index()
    {
       $templates = TemplateService::getTemplates();
       
        return view('dashboard.templates.index', [
            'dbTemplates' => Template::orderByDesc('id')->get(),
            'templates' => $templates
        ]);
    }

}