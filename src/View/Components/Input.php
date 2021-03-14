<?php

namespace Habib\Adminlte\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $label =null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $attributes = $this->attributes ;

        if ($attributes->get('class')) {
            $attributes['class']='form-control';
        }

        if ($label =$attributes->get('label')) {
            $this->label =$label;
            $attributes->except('label');
        }

        if ($name =$attributes['name']) {
            $attributes['value']=old($name ,$attributes['value'] ?? null);

            if ($attributes['multiple']) {
                $attributes['name'].='[]';
            }
        }

        $this->attributes->merge(['class'=>' is-invalid ']);

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('adminlte::components.input');
    }
}
