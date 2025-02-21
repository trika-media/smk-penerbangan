<?php
namespace App\Traits;

trait WithAlert {
    /** 
     * Display Alert On View (feat. toastr.js)
     * 
     * @return void
     */
    public function alert($message, $type, $detail = '')
    {
        session()->flash('alert', [
            'type' => $type,
            'message' => $message,
            'detail' => $detail
        ]);
    }

    /** 
     * Display Alert On View Using Browser Event
     * 
     * @return void
     */
    public function alertEvent($message, $type, $detail = '')
    {
        $this->dispatch('alert', [
            'type' => $type,
            'message' => $message,
            'detail' => $detail
        ]);
    }
}