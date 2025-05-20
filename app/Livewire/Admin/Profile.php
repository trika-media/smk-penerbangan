<?php
namespace App\Livewire\Admin;

use App\Models\User;
use App\Traits\WithAlert;
use Livewire\Component;
use Spatie\LivewireFilepond\WithFilePond;

class Profile extends Component
{
    use WithAlert, WithFilePond;

    public $name, $email, $password, $foto;

    public function mount()
    {
        $data        = User::find(auth()->user()->id);
        $this->name  = $data->name;
        $this->email = $data->email;
    }

    public function resetFilters()
    {
        $this->reset('name', 'email', 'password', 'foto');
    }

    public function save()
    {
        if ($this->foto && !$this->password) {
            $validate = $this->validate([
                'name'  => 'required|max:255',
                'email' => 'required|email',
                'foto'  => 'required|image|file|mimes:png,jpeg,jpg',
            ]);
        } elseif (! $this->password) {
            $validate = $this->validate([
                'name'  => 'required|max:255',
                'email' => 'required|email',
            ]);
        } elseif ($this->password) {
            $validate = $this->validate([
                'name'  => 'required|max:255',
                'email' => 'required|email',
                'password' => 'required|max:255',
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
            $data = User::find(auth()->user()->id);
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

            $this->alertEvent('Data sukses disimpan', 'success');
        } catch (\Exception $e) {
            dd($e);
            $this->alertEvent('Data gagal disimpan', 'danger');
        }
    }

    public function render()
    {
        return view('admin.profile');
    }
}
