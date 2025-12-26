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

    public function show(string $slug)
    {

        $template = TemplateService::getTemplate($slug);

        return view('dashboard.templates.show', [
            'dbTemplate' => Template::where(['slug' => $slug])->first(),
            'template' => $template
        ]);
    }

    public function activate(string $slug) 
    {
        $template = Template::where(['slug' => $slug])->first();
        $template->update(['is_active' => true]);

        toast('Template Activated!', 'success');
        return redirect()->back();
    }

    public function deactivate(string $slug) 
    {
        $template = Template::where(['slug' => $slug])->first();
        $template->update(['is_active' => false]);

        toast('Template Deactivated!', 'success');
        return redirect()->back();
    }

}