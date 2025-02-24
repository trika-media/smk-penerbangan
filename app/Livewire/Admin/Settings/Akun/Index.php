<?php
namespace App\Livewire\Admin\Settings\Akun;

use App\Models\User;
use Livewire\Component;
use App\Traits\WithAlert;
use Illuminate\Support\Str;
use App\Traits\WithPerPagePagination;
use Spatie\LivewireFilepond\WithFilePond;

class Index extends Component
{
    use WithPerPagePagination, WithAlert, WithFilePond;

    public $edit, $delete, $name, $email, $password, $foto;

    public function resetFilters()
    {
        $this->reset('edit', 'delete', 'name', 'email', 'password');
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
        $id   = $this->delete;
        $data = User::findOrFail($id);
        $data->delete();
        $this->resetFilters();
        $this->alertEvent('Berhasil!', 'success', 'Data Berhasil Dihapus');
        $this->dispatch('closedeleteModal');
    }

    public function editMode($id)
    {
        $data        = User::findOrFail($id);
        $this->edit  = $id;
        $this->name  = $data->name;
        $this->email = $data->email;
        $this->dispatch('openmodalCreate');
    }

    public function save()
    {
        if ($this->edit && $this->foto) {
            $validate = $this->validate([
                'name'  => 'required|max:255',
                'email' => 'required|email',
                'foto'  => 'required|image|file|mimes:png,jpeg,jpg',
            ]);
        } elseif ($this->edit) {
            $validate = $this->validate([
                'name'  => 'required|max:255',
                'email' => 'required|email',
            ]);
        } else {
            $validate = $this->validate([
                'name'     => 'required|max:255',
                'email'    => 'required|email',
                'password' => 'required|max:255',
                'foto'     => 'required|image|file|mimes:png,jpeg,jpg',
            ]);
        }

        try {
            if ($this->foto) {
                $filename = 'USER_' . Str::orderedUuid() . '.' . $validate['foto']->getClientOriginalExtension();
            } else {
                $filename = false;
            }
            if ($this->edit) {
                $data = User::find($this->edit);
                $data->update([
                    'name'  => $this->name,
                    'email' => $this->email,
                ]);
                if ($this->password) {
                    $data->update([
                        'password' => bcrypt($this->password),
                    ]);
                }
                if ($filename) {
                    optimize_image($validate['foto'], 'profile', $filename);
                    $data->update([
                        'photo_profile' => $filename,
                    ]);
                }
            } else {
                optimize_image($validate['foto'], 'profile', $filename);
                User::create([
                    'name'     => $this->name,
                    'email'    => $this->email,
                    'password' => bcrypt($this->password),
                    'photo_profile' => $filename
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

    public function getRowsProperty()
    {
        return $this->applyPagination(User::latest());
    }

    public function render()
    {
        return view('admin.settings.akun.index', [
            'rows' => $this->rows,
        ]);
    }
}
