<?php

namespace MantineLivewire\Support;

use Livewire\Component;

class FormContextFactory
{
    /**
     * Create form context with provider and hooks
     * 
     * Returns [FormProvider, useFormContext, useForm]
     */
    public static function create(string $name): array
    {
        // Create form provider component
        $provider = new class extends Component {
            public Component $form;

            public function render()
            {
                return $this->form->render();
            }
        };

        // Create useFormContext function
        $useFormContext = function() use ($name): FormContext {
            $form = app($name);
            if (!$form instanceof Component) {
                throw new \Exception("Form component {$name} not found");
            }
            return new FormContext($form);
        };

        // Create useForm function
        $useForm = function(array $values, array $options = []) use ($name): Component {
            $form = app($name);
            if (!$form instanceof Component) {
                throw new \Exception("Form component {$name} not found");
            }
            $form->initForm($values, $options);
            return $form;
        };

        return [$provider, $useFormContext, $useForm];
    }
}
