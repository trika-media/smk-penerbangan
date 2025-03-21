<?php
namespace App\Livewire\Admin\BiodataSingkat;

use App\Models\Biodata;
use App\Traits\WithAlert;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\LivewireFilepond\WithFilePond;

#[On('render_again')]
class Index extends Component
{
    use WithFilePond, WithAlert;

    public $biodata, $image, $data, $image_row = [], $delete;
    public $step = 'biodata';

    public function mount()
    {
        $data = Biodata::get();
        if (! $data->isEmpty()) {
            $this->biodata = $data?->where('type', 'biodata')?->first()?->value;
            $this->image_row = $data?->where('type', 'biodata_image');
            $this->data = $data;
        }
    }

    public function updatedStep()
    {
        switch ($this->step) {
            case 'biodata':
                $this->biodata = $this->data?->where('type', 'biodata')?->first()?->value;
                $this->image_row = $this->data?->where('type', 'biodata_image');
                break;
            case 'yayasan':
                $this->biodata = $this->data?->where('type', 'yayasan')?->first()?->value;
                $this->image_row = $this->data?->where('type', 'yayasan_image');
                break;
            case 'guru':
                $this->biodata = $this->data?->where('type', 'guru')?->first()?->value;
                $this->image_row = $this->data?->where('type', 'guru_image');
                break;
            case 'extrakurikuler':
                $this->biodata = $this->data?->where('type', 'extrakurikuler')?->first()?->value;
                $this->image_row = $this->data?->where('type', 'extrakurikuler_image');
                break;
        }
    }

    public function resetFilters()
    {
        $this->reset('delete');
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
        $id   = $this->delete;
        $data = Biodata::findOrFail($id);
        $data->delete();
        $this->resetFilters();
        $this->dispatch('render_again');
        $this->alertEvent('Berhasil!', 'success', 'Data Berhasil Dihapus');
        $this->dispatch('closedeleteModal');
    }

    public function save()
    {
        if ($this->image) {
            $validate = $this->validate([
                'biodata' => 'required',
                'image'   => 'required|file|image|mimes:png,jpg,jpeg,svg|max:2048',
            ]);
        } else {
            $validate = $this->validate([
                'biodata' => 'required',
            ]);
        }

        try {
            if ($this->image) {
                $filename = 'BIODATA_' . Str::orderedUuid() . '.' . $validate['image']->getClientOriginalExtension();
            } else {
                $filename = false;
            }

            if (Biodata::where('type', $this->step)->first() || $validate['biodata']) {
                Biodata::where('type', $this->step)->delete();
                Biodata::create([
                    'type'  => $this->step,
                    'value' => $validate['biodata'],
                ]);
            }

            if ($filename) {
                $count = Biodata::where('type', $this->step . '_image')->count();
                if ($count > 7) {
                    $this->alertEvent('Maksimal hanya 7 gambar, Silahkan hapus beberapa gambar!', 'danger');
                }
                optimize_image($validate['image'], 'biodata', $filename);
                Biodata::create([
                    'type'  => $this->step . '_image',
                    'value' => $filename,
                ]);
            }
            
            return redirect()->route('biodata-singkat.index');
            $this->alert('Data Sukses Disimpan', 'success');
        } catch (\Exception $e) {
            dd($e);
            $this->alert('Data Gagal Disimpan', 'danger');
        }
    }

    public function render()
    {
        return view('admin.biodata-singkat.index', [
            'image_row' => $this->image_row,
        ]);
    }
}
