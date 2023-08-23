<?php

namespace App\Nova\Layouts;

use Manogi\Tiptap\Tiptap;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class ContentLayout extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = 'content_layout';

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = 'Content';

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Tiptap::make(__('Content'), 'html__content')
                ->buttons(config('nova-tiptap-field.buttons'))
                ->headingLevels(config('nova-tiptap-field.headingLevels'))
                ->linkSettings(['withFileUpload' => config('nova-tiptap-field.withFileUpload')])
                ->rules('required')->required()
        ];
    }
}
