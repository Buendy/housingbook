<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('text','components.form.text', ['name', 'value' => null, 'attributes' => []]);
        Form::component('textArea','components.form.textarea', ['name', 'value' => null, 'attributes' => []]);
        Form::component('number','components.form.number', ['name', 'value' => null, 'attributes' => []]);
        Form::component('date','components.form.date', ['name', 'value' => null, 'attributes' => []]);
        Form::component('email','components.form.email', ['name', 'value' => null, 'attributes' => []]);
        Form::component('password','components.form.password', ['name', 'attributes' => []]);
        Form::component('radio','components.form.radio', ['name', 'value' => null, 'attributes' => []]);
        Form::component('checkbox','components.form.checkbox', ['name', 'value' => null, 'attributes' => []]);
        Form::component('file', 'components.form.file', ['name', 'attributes' => []]);
        Form::component('hidden', 'components.form.hidden', ['name', 'value'=>null, 'attributes' => []]);
        Form::component('submit', 'components.form.submit', ['value' => 'Submit', 'attributes' => []]);
        Form::component('reset', 'components.form.reset', ['value' => 'Reset', 'attributes' => []]);

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
