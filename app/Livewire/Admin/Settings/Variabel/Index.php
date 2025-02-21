<?php

namespace App\Livewire\Admin\Settings\Variabel;

use App\Models\Setting;
use Livewire\Component;
use App\Traits\WithAlert;
use App\Traits\WithPerPagePagination;

class Index extends Component
{
    use WithAlert, WithPerPagePagination;

    public $edit, $delete, $config_name, $value;

    public function rules() {
        return [
            'config_name' => 'required|max:100',
            'value' => 'required|max:255',
        ];
    }

    public function resetFilters() {
        return $this->reset('edit','delete','config_name','value');
    }

    public function cancelEdit() {
        $this->resetFilters();
        $this->dispatch('closemodalCreate');
    }

    public function cancelDelete() {
        $this->resetFilters();
        $this->dispatch('closedeleteModal');
    }

    public function deleteSelected($id)
    {
        $this->delete = $id;
        $this->dispatch('opendeleteModal');
    }

    public function deleteData()
    {
        $id = $this->delete;
        $data = Setting::findOrFail($id);
        $data->delete();
        $this->resetFilters();
        $this->alertEvent('Berhasil!', 'success', 'Data Berhasil Dihapus');
        $this->dispatch('closedeleteModal');
    }

    public function editMode($id)
    {
        $data = Setting::findOrFail($id);
        $this->edit = $id;
        $this->config_name = $data->config_name;
        $this->value = $data->value;
        $this->dispatch('openmodalCreate');
    }

    public function save() {
        $validate = $this->validate();

        try {
            if($this->edit) {
                $data = Setting::find($this->edit);
                $data->update([
                    'config_name' => $this->config_name,
                    'value' => $this->value
                ]);
            } else {
                Setting::create([
                    'config_name' => $this->config_name,
                    'value' => $this->value
                ]);
            }
            $this->resetFilters();

            $this->alertEvent('Data sukses disimpan', 'success');
            $this->dispatch('closemodalCreate');
        } catch (\Exception $e) {
            dd($e);
            $this->alertEvent('Data gagal disimpan', 'danger');
            $this->dispatch('closemodalCreate');
        }
    }

    public function getRowsProperty() {
        return $this->applyPagination(Setting::latest());
    }

    public function render()
    {
        return view('admin.settings.variabel.index', [
            'rows' => $this->rows
        ]);
    }
}
