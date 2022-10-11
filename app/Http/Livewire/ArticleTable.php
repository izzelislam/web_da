<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class ArticleTable extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\Article>
    */
    public function datasource(): Builder
    {
        $query = Article::query();
        $query->with('category');
        $query->orderBy('created_at', 'desc');
        return $query;
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('category_id')
            ->addColumn('category', function (Article $article) {
                return '<span>' . isset($article->category->name) ?  $article->category->name : '' . '</span>';
            })
            ->addColumn('title')

           /** Example of custom column using a closure **/
            ->addColumn('title_lower', function (Article $model) {
                return strtolower(e($model->title));
            })

            ->addColumn('meta')
            ->addColumn('slug')
            ->addColumn('cover_image')
            ->addColumn('img', function (Article $article) {
                return '<img src="' . asset($article->cover_image) . '" style="width: 100px; height: 60px;">';
            })
            ->addColumn('content')
            ->addColumn('created_by')
            ->addColumn('updated_by')
            ->addColumn('created_at_formatted', fn (Article $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Article $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->hidden()
                ->makeInputRange(),

            Column::make('CATEGORY ID', 'category_id')
                ->hidden()
                ->makeInputRange(),
            
            Column::add()
                ->title('CATEGORY')
                ->field('category', 'category_id')
                ->makeInputText()
                ->searchable()
                ->sortable(),

            Column::make('TITLE', 'title')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('META', 'meta')
                ->hidden()
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('SLUG', 'slug')
                ->hidden()
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('COVER IMAGE', 'cover_image')
                ->hidden()
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('COVER IMAGE', 'img'),

            Column::make('CONTENT', 'content')
                ->hidden()
                ->sortable()
                ->searchable(),

            Column::make('CREATED BY', 'created_by')
                ->hidden()
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('UPDATED BY', 'updated_by')
                ->hidden()
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('CREATED AT', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

            Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Article Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        return [
            Button::add('edit')
                ->bladeComponent('livewire.edit-button', [
                    "route"     => '/admin/article/',
                    "id"        => 'id',
                    "routefor" => '/edit'
                ]),

            Button::add('detail')
                ->bladeComponent('livewire.detail-button', [
                    "route"     => '/admin/article/',
                    "id"        => 'id',
                ]),
            Button::add('delete')
                ->bladeComponent('livewire.delete-button', [
                    "route"     => '/admin/article/',
                    "id"        => 'id',
                ])
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Article Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($article) => $article->id === 1)
                ->hide(),
        ];
    }
    */
}
