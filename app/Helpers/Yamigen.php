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
        return $name . ' not found';
    }
}

if (! function_exists('inisial')) {
    function inisial($string, $limit_char = 5)
    {
        $ret     = '';
        $ret_num = '';
        if ($string != '') {
            foreach (explode(' ', $string) as $word) {
                for ($i = 0; $i <= strlen($word) - 1; $i++) {
                    if (is_numeric($word[$i])) {
                        $ret_num .= $word[$i];
                    }
                }
                if (! is_numeric(substr($word, 0, 1))) {
                    $ret .= strtoupper(substr($word, 0, 1));
                }
            }
            if (count(str_split($ret)) == 1) {
                return strtoupper(substr($string, 0, $limit_char)) . $ret_num;
            }
            return substr($ret, 0, $limit_char) . $ret_num;
        } else {
            return '';
        }
    }
}