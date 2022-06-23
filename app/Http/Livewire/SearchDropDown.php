<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchDropDown extends Component
{
    public $term;
    public $users;

    public function mount()
    {
        $this->resetlist();
    }

    public function resetlist()
    {
        $this->term  =   '';
        $this->users        =   [];
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->users) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->users) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $user = $this->users[$this->highlightIndex] ?? null;
        // if ($user) {
        //     $this->redirect(route('show-contact', $user['id']));
        // }
    }

    public function updatedTerm(){
        $this->users = User::where('name', 'like', '%' . $this->term . '%')
            ->get()
            ->toArray();
    }
    public function render()
    {
        return view('livewire.search-drop-down');
    }
}
