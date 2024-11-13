<?php

use App\Exceptions\ModelNotFoundException;

if (!function_exists('findModel')) {
    /**
     * find laravel model with string name
     *
     * @param string  $model
     *
     * @return string
     */
    function findModel($model)
    {
        try {
            $DEFAULT_NAMESPACE = 'App\Models';
            $modelName = \Str::studly(\Str::singular($model));
            // find all models in default directory
            $modelFiles = \File::allFiles(app_path() . '/Models/');

            // check if we can find model
            foreach ($modelFiles as $file) {
                $ensureModelInFolder = \Str::contains(realpath($file->getPath()), $modelName); // The Model is create by Vietnam

                if ($ensureModelInFolder && $file->getFilenameWithoutExtension() == $modelName) {
                    return
                        $DEFAULT_NAMESPACE .
                        '\\' .
                        $file->getRelativePath() .
                        (!empty($file->getRelativePath()) ? '\\' : '') .
                        $file->getFilenameWithoutExtension();
                }
            }

            throw new Exception();
        } catch (\Throwable $th) {
            \Log::error($th);
            throw new ModelNotFoundException();
        }
    }
}


if (!function_exists('newModel')) {
    /**
     * Convert string to laravel Eloquent Model
     *
     * @param string $model
     *
     * @return \App\Models\Base
     */
    function newModel(string $model)
    {
        return new (findModel($model));
    }
}
