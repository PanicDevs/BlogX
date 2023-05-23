<?php

namespace Modules\Filament\Providers;

use Closure;
use Filament\Forms\Components\ColorPicker;
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

            $backtrace = debug_backtrace();
            $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
            $this->label = __($module . '::attribute.' . $this->getName() . '.label');
            return $this;
        });
        Field::macro('autoLabel', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->label = $trans;
                return $this;
            }

            $backtrace = debug_backtrace();
            $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
            $this->label = __($module . '::attribute.' . $this->getName() . '.label');
            return $this;
        });

        TextInput::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->placeholder = $trans;
                return $this;
            }

            $backtrace = debug_backtrace();
            $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
            $this->placeholder = __($module . '::attribute.' . $this->getName() . '.placeholder');
            return $this;
        });
        Select::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->placeholder = $trans;
                return $this;
            }

            $backtrace = debug_backtrace();
            $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
            $this->placeholder = __($module . '::attribute.' . $this->getName() . '.placeholder');
            return $this;
        });
        FileUpload::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->placeholder = $trans;
                return $this;
            }

            $backtrace = debug_backtrace();
            $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
            $this->placeholder = __($module . '::attribute.' . $this->getName() . '.placeholder');
            return $this;
        });
        DateTimePicker::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->placeholder = $trans;
                return $this;
            }

            $backtrace = debug_backtrace();
            $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
            $this->placeholder = __($module . '::attribute.' . $this->getName() . '.placeholder');
            return $this;
        });
        DatePicker::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->placeholder = $trans;
                return $this;
            }

            $backtrace = debug_backtrace();
            $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
            $this->placeholder = __($module . '::attribute.' . $this->getName() . '.placeholder');
            return $this;
        });
        TimePicker::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->placeholder = $trans;
                return $this;
            }

            $backtrace = debug_backtrace();
            $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
            $this->placeholder = __($module . '::attribute.' . $this->getName() . '.placeholder');
            return $this;
        });
        RichEditor::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->placeholder = $trans;
                return $this;
            }

            $backtrace = debug_backtrace();
            $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
            $this->placeholder = __($module . '::attribute.' . $this->getName() . '.placeholder');
            return $this;
        });
        MarkdownEditor::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->placeholder = $trans;
                return $this;
            }

            $backtrace = debug_backtrace();
            $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
            $this->placeholder = __($module . '::attribute.' . $this->getName() . '.placeholder');
            return $this;
        });
        TagsInput::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->placeholder = $trans;
                return $this;
            }

            $backtrace = debug_backtrace();
            $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
            $this->placeholder = __($module . '::attribute.' . $this->getName() . '.placeholder');
            return $this;
        });
        Textarea::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->placeholder = $trans;
                return $this;
            }

            $backtrace = debug_backtrace();
            $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
            $this->placeholder = __($module . '::attribute.' . $this->getName() . '.placeholder');
            return $this;
        });
        ColorPicker::macro('autoPlaceholder', function (string $trans = null): self
        {
            if ($trans)
            {
                $this->placeholder = $trans;
                return $this;
            }

            $backtrace = debug_backtrace();
            $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
            $this->placeholder = __($module . '::attribute.' . $this->getName() . '.placeholder');
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
        $classes = [Column::class, Field::class];

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

            $backtrace = debug_backtrace();
            $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
            $this->label = __($module . '::attribute.' . $this->getName() . '.label');
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

            $backtrace = debug_backtrace();
            $module = strtolower(explode('\\', $backtrace[2]['class'])[1]);
            $this->placeholder = __($module . '::attribute.' . $this->getName() . '.placeholder');
            return $this;
        })(...);
    }
}
