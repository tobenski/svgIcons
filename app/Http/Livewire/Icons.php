<?php

namespace App\Http\Livewire;

use App\Models\Icon;
use Livewire\Component;

class Icons extends Component
{
    public $icons, $name, $description, $content, $icon_id;
    public $isOpen = 0;

    public function render()
    {
        $this->icons = Icon::all();

        return view('livewire.icons');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->content = '';
        $this->icon_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        Icon::updateOrCreate(['id' => $this->icon_id], [
            'name' => $this->name,
            'description' => $this->description,
            'content' => $this->content,
        ]);

        session()->flash('message', $this->icon_id ? 'Icon updated succesfully!!' : 'Icon created succesfully!!');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit(Icon $icon)
    {
        $this->icon_id = $icon->id;
        $this->name = $icon->name;
        $this->description = $icon->description;
        $this->content = $icon->content;

        $this->openModal();
    }

    public function delete(Icon $icon)
    {
        $icon->delete();
        session()->flash('message', 'Icon deleted succesfully!!');
    }
}
