<?php
namespace App\Livewire\Admin\RunningText;

use App\Models\Biodata;
use App\Traits\WithAlert;
use App\Traits\WithPerPagePagination;
use Livewire\Component;

class Index extends Component
{
    use WithAlert, WithPerPagePagination;

    public $text, $edit, $delete;

    public function editMode($id)
    {
        $data       = Biodata::findOrFail($id);
        $this->edit = $id;
        $this->type = $data->type;
        $this->text = $data->value;

        $this->dispatch('openmodalCreate');
    }

    public function save()
    {
        $validate = $this->validate([
            'text'      => 'required|min:1|max:255'
        ]);

        try {
            if ($this->edit) {
                $komp = Biodata::findOrFail($this->edit);
                $komp->update([
                    'type' => 'running_text',
                    'value' => $validate['text']
                ]);
            } else {
                Biodata::create([
                    'type' => 'running_text',
                    'value' => $validate['text']
                ]);
            }

            $this->dispatch('closemodalCreate');
            $this->reset('text');

            $this->alertEvent("Data Sukses Ditambahkan", "success");
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function cancelEdit()
    {
        $this->edit = null;
        $this->dispatch('closemodalCreate');
    }

    public function cancelDelete()
    {
        $this->delete = null;
        $this->dispatch('closedeleteModal');
    }

    public function deleteSelected($id)
    {
        $this->delete = $id;
        $this->dispatch('opendeleteModal');
    }

    public function deleteData()
    {
        try {
            Biodata::findOrFail($this->delete)->delete();

            $this->alertEvent("Data Sukses Dihapus", "success");
            $this->dispatch('closedeleteModal');
        } catch (\Exception $e) {
            $this->alertEvent("Data Gagal Dihapus", "danger");
            $this->dispatch('closedeleteModal');
        }
    }

    public function getRowsProperty()
    {
        $data = Biodata::where('type', 'running_text')->latest();
        return $this->applyPagination($data);
    }

    public function render()
    {
        return view('admin.running-text.index', [
            'rows' => $this->rows,
        ]);
    }
}
