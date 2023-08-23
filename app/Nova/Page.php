<?php

namespace App\Nova;

use App\Nova\Layouts\ContentLayout;
use App\Nova\Layouts\QuoteLayout;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\Traits\HasTabs;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Whitecube\NovaFlexibleContent\Flexible;

class Page extends Resource
{
    use HasTabs;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Page::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The visual style used for the table. Available options are 'tight' and 'default'.
     *
     * @var string
     */
    public static $tableStyle = 'tight';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
    ];

    public static $globallySearchable = true;

    public static $meta_robots_options = [
        'index, follow',
        'follow',
        'noindex, follow',
        'index, nofollow',
        'noindex, nofollow',
    ];

    public static function getFlexibleLayoutCasts(): array
    {
        return [
            'content_layout' => ContentLayout::class,
            'quote_layout' => QuoteLayout::class,
        ];
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     * @throws \Exception
     */
    public function fields(Request $request)
    {
        $pagetitle = $this->resource->id ? __('Update :resource: :title', ['resource'=> $this->singularLabel(), 'title' => $this->resource->title]) : __('Create :resource', ['resource'=> $this->singularLabel()]);

        $tabs = [
            Tab::make(__('General'), [
                Text::make(__('Title'), 'title')
                    ->rules('required')->required()
                    ->sortable(),
                Slug::make(__('Slug'), 'slug')
                    ->from('title')
                    ->separator('-')
                    ->rules('required')->required()
                    ->sortable(),
                DateTime::make(__('Updated'), 'updated_at')
                    ->displayUsing(fn ($value) => $value->diffForHumans())
                    ->sortable()->exceptOnForms(),
            ]),
            Tab::make(__('Content'), $this->getFlexibleContentFields('content')),
        ];
        return [Tabs::make($pagetitle, $tabs)->withToolbar()];
    }


    public function addFlexibleLayoutsToEditor($editor)
    {
        $editor
            ->addLayout(new ContentLayout())
            ->addLayout(new QuoteLayout())
        ;

        return $editor;
    }

    protected function getFlexibleContentFields($field = 'content'): array
    {
        return [
            $this->addFlexibleLayoutsToEditor($this->getFlexibleEditor($field))
        ];
    }

    protected function getFlexibleEditor($field = 'content')
    {
        return Flexible::make('', $field)->fullWidth();
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    /**
     * @return string
     */
    public static function label()
    {
        return __('Pages');
    }

    /**
     * @return string
     */
    public static function singularLabel()
    {
        return __('Page');
    }
}
