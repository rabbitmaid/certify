<?php

namespace App\Http\Controllers\Dashboard\Admin;
use App\Models\Template;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\TemplateService;
use App\Http\Controllers\Controller;

class TemplateController extends Controller {

    public function index()
    {
       $templates = TemplateService::getTemplates();
       
        return view('dashboard.admin.templates.index', [
            'dbTemplates' => Template::orderByDesc('id')->get(),
            'templates' => $templates
        ]);
    }

    public function create() 
    {
        return view('dashboard.admin.templates.create');
    }

    public function upload(Request $request) {
        
         $request->validate(['file' => 'required|mimes:zip']);

         $path = $request->file('file')->store('template_zips');

         $file = TemplateService::uploadTemplate($path);

        if(!$file) {
           toast('Template Not Uploaded!', 'error');
        }

        Template::updateOrCreate(
            ['slug' => Str::slug($file['fileName'])],
            ['name' => $file['fileName'], 'slug' => Str::slug($file['fileName']), 'is_active' => false]
        );

        toast('Template Uploaded!', 'success');
        return redirect()->back();
    }

    public function show(string $slug)
    {

        $template = TemplateService::getTemplate($slug);

        return view('dashboard.admin.templates.show', [
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


    public function destroy(Request $request) {

        $validated = $request->validate(['id' => 'required']);

        $template = Template::findOrFail($validated['id']);

        $file = TemplateService::deleteTemplate($template->name);

        if(!$file)  {
            toast('Template Delete failed!', 'error');
            return redirect()->back();
        }

        $template->delete();
        
        toast('Template Delete Success!', 'success');
        return redirect()->back();
    }

}