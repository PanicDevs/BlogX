<?php

namespace Modules\Filament\Providers;

use Closure;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\Column;
use Illuminate\Support\ServiceProvider;
use Modules\Filament\Enums\Context;
use Throwable;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        //$this->addAutoLabelAbility();
        //$this->addAutoPlaceholderAbility();

        $this->registerMacrosForAutoComplete();
    }

    /**
     * WTH!! It should be removed!
     *
     * @return void
     */
    private function registerMacrosForAutoComplete(): void
    {
        Column::macro('autoLabel', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            try
            {
                try
                {
                    $key = $this->getName();
                }
                catch (Throwable)
                {
                    $key = $this->getLabel();
                }

                $backtrace = debug_backtrace();
                $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
                $this->label = __($module . '::attribute.' . $key . '.label');
            }
            catch (Throwable)
            {
                $this->label = 'Undefined';
            }
            return $this;
        });
        Field::macro('autoLabel', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            try
            {
                try
                {
                    $key = $this->getName();
                }
                catch (Throwable)
                {
                    $key = $this->getLabel();
                }

                $backtrace = debug_backtrace();
                $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
                $this->label = __($module . '::attribute.' . $key . '.label');
            }
            catch (Throwable)
            {
                $this->label = 'Undefined';
            }
            return $this;
        });
        Component::macro('autoLabel', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            try
            {
                try
                {
                    $key = $this->getName();
                }
                catch (Throwable)
                {
                    $key = $this->getLabel();
                }

                $backtrace = debug_backtrace();
                $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
                $this->label = __($module . '::attribute.' . $key . '.label');
            }
            catch (Throwable)
            {
                $this->label = 'Undefined';
            }
            return $this;
        });
        Component::macro('requiredOn', function (Context $iContext): self
        {
            $this->isRequired = fn($context) => $context === $iContext->value;
            return $this;
        });

        Component::macro('requiredOn', function (Context $iContext): self
        {
            $this->isRequired = fn($context) => $context == $iContext->value;
            return $this;
        });

        Component::macro('requiredExcept', function (Context $iContext): self
        {
            $this->isRequired = fn($context) => $context != $iContext->value;
            return $this;
        });

        TextInput::macro('preventAutocomplete', function ()
        {
            $this->autocomplete = 'new-' . $this->getName();

            return $this;
        });

        TextInput::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            try
            {
                try
                {
                    $key = $this->getName();
                }
                catch (Throwable)
                {
                    $key = $this->getLabel();
                }

                $backtrace = debug_backtrace();
                $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
                $this->placeholder = __($module . '::attribute.' . $key . '.placeholder');
            }
            catch (Throwable)
            {
                $this->placeholder = 'Undefined';
            }

            return $this;
        });
        Select::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            try
            {
                try
                {
                    $key = $this->getName();
                }
                catch (Throwable)
                {
                    $key = $this->getLabel();
                }

                $backtrace = debug_backtrace();
                $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
                $this->placeholder = __($module . '::attribute.' . $key . '.placeholder');
            }
            catch (Throwable)
            {
                $this->placeholder = 'Undefined';
            }

            return $this;
        });
        FileUpload::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            try
            {
                try
                {
                    $key = $this->getName();
                }
                catch (Throwable)
                {
                    $key = $this->getLabel();
                }

                $backtrace = debug_backtrace();
                $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
                $this->placeholder = __($module . '::attribute.' . $key . '.placeholder');
            }
            catch (Throwable)
            {
                $this->placeholder = 'Undefined';
            }

            return $this;
        });
        DateTimePicker::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            try
            {
                try
                {
                    $key = $this->getName();
                }
                catch (Throwable)
                {
                    $key = $this->getLabel();
                }

                $backtrace = debug_backtrace();
                $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
                $this->placeholder = __($module . '::attribute.' . $key . '.placeholder');
            }
            catch (Throwable)
            {
                $this->placeholder = 'Undefined';
            }

            return $this;
        });
        DatePicker::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            try
            {
                try
                {
                    $key = $this->getName();
                }
                catch (Throwable)
                {
                    $key = $this->getLabel();
                }

                $backtrace = debug_backtrace();
                $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
                $this->placeholder = __($module . '::attribute.' . $key . '.placeholder');
            }
            catch (Throwable)
            {
                $this->placeholder = 'Undefined';
            }

            return $this;
        });
        TimePicker::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            try
            {
                try
                {
                    $key = $this->getName();
                }
                catch (Throwable)
                {
                    $key = $this->getLabel();
                }

                $backtrace = debug_backtrace();
                $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
                $this->placeholder = __($module . '::attribute.' . $key . '.placeholder');
            }
            catch (Throwable)
            {
                $this->placeholder = 'Undefined';
            }

            return $this;
        });
        RichEditor::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            try
            {
                try
                {
                    $key = $this->getName();
                }
                catch (Throwable)
                {
                    $key = $this->getLabel();
                }

                $backtrace = debug_backtrace();
                $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
                $this->placeholder = __($module . '::attribute.' . $key . '.placeholder');
            }
            catch (Throwable)
            {
                $this->placeholder = 'Undefined';
            }

            return $this;
        });
        MarkdownEditor::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            try
            {
                try
                {
                    $key = $this->getName();
                }
                catch (Throwable)
                {
                    $key = $this->getLabel();
                }

                $backtrace = debug_backtrace();
                $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
                $this->placeholder = __($module . '::attribute.' . $key . '.placeholder');
            }
            catch (Throwable)
            {
                $this->placeholder = 'Undefined';
            }

            return $this;
        });
        TagsInput::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            try
            {
                try
                {
                    $key = $this->getName();
                }
                catch (Throwable)
                {
                    $key = $this->getLabel();
                }

                $backtrace = debug_backtrace();
                $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
                $this->placeholder = __($module . '::attribute.' . $key . '.placeholder');
            }
            catch (Throwable)
            {
                $this->placeholder = 'Undefined';
            }

            return $this;
        });
        Textarea::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            try
            {
                try
                {
                    $key = $this->getName();
                }
                catch (Throwable)
                {
                    $key = $this->getLabel();
                }

                $backtrace = debug_backtrace();
                $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
                $this->placeholder = __($module . '::attribute.' . $key . '.placeholder');
            }
            catch (Throwable)
            {
                $this->placeholder = 'Undefined';
            }

            return $this;
        });
        ColorPicker::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            try
            {
                try
                {
                    $key = $this->getName();
                }
                catch (Throwable)
                {
                    $key = $this->getLabel();
                }

                $backtrace = debug_backtrace();
                $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
                $this->placeholder = __($module . '::attribute.' . $key . '.placeholder');
            }
            catch (Throwable)
            {
                $this->placeholder = 'Undefined';
            }

            return $this;
        });
    }

    /**
     * Add auto-label ability to the fields
     *
     * @return void
     */
    private function addAutoLabelAbility(): void
    {
        $classes = [Column::class, Field::class, Component::class];

        foreach ($classes as $class)
            $class::macro('autoLabel', $this->autoLabelAbility());
    }

    /**
     * Add auto-placeholder ability to the fields
     *
     * @return void
     */
    private function addAutoPlaceholderAbility(): void
    {
        $classes = [
            TextInput::class,
            Select::class,
            FileUpload::class,
            DateTimePicker::class,
            DatePicker::class,
            TimePicker::class,
            RichEditor::class,
            MarkdownEditor::class,
            TagsInput::class,
            Textarea::class,
            ColorPicker::class,
        ];

        foreach ($classes as $class)
            $class::macro('autoPlaceholder', $this->autoPlaceholderAbility());
    }

    /**
     * Auto Label Ability as a closure
     *
     * @return Closure
     */
    private function autoLabelAbility(): Closure
    {
        return (function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            try
            {
                try
                {
                    $key = $this->getName();
                }
                catch (Throwable)
                {
                    $key = $this->getLabel();
                }

                $backtrace = debug_backtrace();
                $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
                $this->label = __($module . '::attribute.' . $key . '.label');
            }
            catch (Throwable)
            {
                $this->label = 'Undefined';
            }
            return $this;
        })(...);
    }

    /**
     * Auto Placeholder Ability as a closure
     *
     * @return Closure
     */
    private function autoPlaceholderAbility(): Closure
    {
        return (function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            try
            {
                try
                {
                    $key = $this->getName();
                }
                catch (Throwable)
                {
                    $key = $this->getLabel();
                }

                $backtrace = debug_backtrace();
                $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
                $this->placeholder = __($module . '::attribute.' . $key . '.placeholder');
            }
            catch (Throwable)
            {
                $this->placeholder = 'Undefined';
            }

            return $this;
        })(...);
    }

    /**
     * Required On Ability as a closure
     *
     * @return Closure
     */
    private function requiredOnAbility(): Closure
    {
        return (function (Context $iContext): self
        {
            $this->isRequired = fn($context) => $context == $iContext->value;
            return $this;
        })(...);
    }

    /**
     * Required Except Ability as a closure
     *
     * @return Closure
     */
    private function requiredExceptAbility(): Closure
    {
        return (function (Context $iContext): self
        {
            $this->isRequired = fn($context) => $context != $iContext->value;
            return $this;
        })(...);
    }
}
