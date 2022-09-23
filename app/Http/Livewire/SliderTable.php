<?php

namespace App\Http\Livewire;

use App\Models\Slider;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};
use Illuminate\Support\Str;

final class SliderTable extends PowerGridComponent
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
    * @return Builder<\App\Models\Slider>
    */
    public function datasource(): Builder
    {
        return Slider::query();
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
            ->addColumn('content', function (Slider $slider) {
                return '
                <div style="width: 400px;">
                    <small><i>title :</i></small>
                    <h6 class="fw-bold fs-6">'.$slider->title.'</h6>
                    <small><i>deskripsi :</i></small>
                    <div>
                    <p class="" style="display: inline-block;">'. Str::limit($slider->subtitle, 60, '<small><i class="text-danger">.......selengkapnya</i></small>').'</p>        
                    </div>
                <div>';
            })
            ->addColumn('img', function (Slider $slider) {
                return '<img src="' . asset($slider->img) . '" style="width: 200px; height: 100px;">';
            });
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

            Column::add()
                ->title('Caption')
                ->field('content', 'title') 
                ->searchable()
                ->sortable(),

            Column::add()
                ->title('GAMBAR')
                ->field('img', 'image')
                ->searchable()
                ->sortable(),

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
     * PowerGrid Slider Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
       return [
            Button::add('edit')
                ->bladeComponent('livewire.edit-button', [
                    "route"     => '/admin/slider/',
                    "id"        => 'id',
                    "routefor" => '/edit'
                ]),

            Button::add('detail')
                ->bladeComponent('livewire.detail-button', [
                    "route"     => '/admin/slider/',
                    "id"        => 'id',
                ]),
            Button::add('delete')
                ->bladeComponent('livewire.delete-button', [
                    "route"     => '/admin/slider/',
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
     * PowerGrid Slider Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($slider) => $slider->id === 1)
                ->hide(),
        ];
    }
    */
}
