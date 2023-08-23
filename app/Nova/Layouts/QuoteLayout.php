<?php

namespace App\Nova\Layouts;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class QuoteLayout extends Layout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = 'quote_layout';

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = 'Quote';

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Textarea::make(__('Quote text'), 'quote_text')
                ->rules('required')
                ->hideFromIndex(),
            Text::make(__('Quote name'), 'quote_name')
                ->rules('required')
                ->hideFromIndex(),
        ];
    }
}
