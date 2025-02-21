<?php
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;

if(!function_exists('optimize_image')) {
    /**
     * Optimizing Image By Compressing The Image
     * 
     * @return void
     */
    function optimize_image($temp_image, $disk, $filename = '') {
        if($filename == '') {
            $filename = strtoupper($disk) . '_' . Str::orderedUuid() . '.' . $temp_image->getClientOriginalExtension();
        }
        OptimizerChainFactory::create()->optimize($temp_image->getRealPath(), Storage::disk($disk)->path('') . '/' . $filename);
    }
}

if(!function_exists('config_get')) {
    /**
     * Get Data From Setting Model
     * 
     * @return void
     */
    function config_get($name) {
        $config = Setting::where('config_name', $name)->first();
        if($config) {
            return $config->value;
        }
        return 'not found';
    }
}