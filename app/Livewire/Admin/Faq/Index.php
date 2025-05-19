<?php

namespace App\Livewire\Admin\Faq;

use App\Models\Faq;
use Livewire\Component;
use App\Traits\WithAlert;
use App\Traits\WithPerPagePagination;

class Index extends Component
{
    use WithPerPagePagination, WithAlert;

    public $edit, $delete, $question, $answer;

    public function rules() {
        return [
            'question' => 'required|max:255',
            'answer' => 'required'
        ];
    }

    public function resetFilters() {
        $this->reset('edit', 'delete', 'question', 'answer');
    }

    public function cancelEdit()
    {
        $this->resetFilters();
        $this->dispatch('closemodalCreate');
    }

    public function cancelDelete()
    {
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
        $data = Faq::findOrFail($id);
        $data->delete();
        $this->resetFilters();
        $this->alertEvent('Berhasil!', 'success', 'Data Berhasil Dihapus');
        $this->dispatch('closedeleteModal');
    }

    public function editMode($id)
    {
        $data = Faq::findOrFail($id);
        $this->edit = $id;
        $this->question = $data->question;
        $this->answer = $data->answer;
        $this->dispatch('openmodalCreate');
    }

    public function save() {
        $validate = $this->validate();

        try {
            if($this->edit) {
                $data = Faq::find($this->edit);
                $data->update([
                    'question' => $this->question,
                    'answer' => $this->answer
                ]);
            } else {
                Faq::create([
                    'question' => $this->question,
                    'answer' => $this->answer
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
        return $this->applyPagination(Faq::latest());
    }

    public function render()
    {
        return view('admin.faq.index', [
            'rows' => $this->rows
        ]);
    }
}
