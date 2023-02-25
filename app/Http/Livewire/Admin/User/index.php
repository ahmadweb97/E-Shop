<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $user_id;

    public function deleteUser($user_id)
    {

        $this->user_id = $user_id;
    }


    public function destroyUser()
    {

       $user = User::find($this->user_id);

       $user->delete();
       session()->flash('message', "User has been deleted successfully!");
       $this->dispatchBrowserEvent('close-modal');

    }


    public function render()
    {
        $users = User::orderBy('id', 'DESC')->paginate(10);

        return view('livewire.admin.user.index', ['users' => $users]);
    }
}
