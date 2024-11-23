<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tinymceEditor extends Component
{
    public $name;

    public function __construct($name = 'defaultName') // Giá trị mặc định
    {
        $this->name = $name;
    }

    public function render()
    {
        return view('components.forms.tinymce-editor');
    }
}