<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Collection;

class TemplateService {

    public static function getTemplates(): Collection
    {
        $templateDirectory = config('template.path');
        $templates = new Collection;
        
        // Check if template directory exist
        if(is_dir($templateDirectory)) {

            // Get all template folders within the directory
            if ($directoryHandle = opendir($templateDirectory)){
                while (($templateFolder = readdir($directoryHandle)) !== false){

                    // get folders except the root and the previous dir strings
                    if(!in_array($templateFolder,['.', '..'])) {

                      
                        $templateFolderContent = "$templateDirectory/$templateFolder";
                        
                        // get contents of each individual template directory
                        // check if the info.json file exist

                        if(file_exists("$templateFolderContent/info.json")) {
                            $templateInfo = file_get_contents("$templateFolderContent/info.json");
                            $templateInfo = json_decode($templateInfo, true);

                            // get content of info.json and save in the templates collection
                            $templateInfo["path"] = $templateFolderContent;
                            $templateInfo["slug"] = $templateFolder;

                            if(array_key_exists("screenshot", $templateInfo)) {
                                if(empty($templateInfo['screenshot'])) {
                                    $templateInfo['screenshot'] = "no-screenshot.png";
                                }
                            }

                            $templates->add($templateInfo);

                        }
                        else {
                            throw new Exception("Certificate template has no info.json file");
                        }

                    }
                }

                // close handle when done
                closedir($directoryHandle);

            }else {
                throw new Exception("Unexpected error while accessing the template directory");
            }

        }
        else {
             throw new Exception("No certificate template directory available");
        }

        return $templates;
    }

    public static function getTemplate(string $slug): array
    {
        $templates = self::getTemplates();
        $template = $templates->where('slug', $slug)->first();
       
        return $template;
    }

}