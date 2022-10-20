<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class UserTable extends PowerGridComponent
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
    * @return Builder<\App\Models\User>
    */
    public function datasource(): Builder
    {
        $users = User::query();
        $users->with('schoolYear');

        if (empty(request('school_year'))){
            $users->whereHas('schoolYear', function($query){
                $query->where('status', 1);
            });
        }

        if (!empty(request('unit'))){
            $users->whereHas('unit', function($query){
                $query->where('id', request('unit'));
            });
        }
        
        if (!empty(request('school_year'))){
            $users->whereHas('schoolYear', function($query){
                $query->where('year', request('school_year'));
            });
        }

        $users->orderBy('created_at', 'desc');

        return $users;
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
            ->addColumn('unit_id')
            ->addColumn('unit', function (User $unit) {
                return '<span>' . isset($unit->unit->name) ?  $unit->unit->name : '' . '</span>';
            })
            ->addColumn('school_year_id')
            ->addColumn('school_year', function (User $year) {
                return '<span>' . isset( $year->schoolYear->year) ?  $year->schoolYear->year : '' . '</span>';
            })
            ->addColumn('name')

           /** Example of custom column using a closure **/
            ->addColumn('name_lower', function (User $model) {
                return strtolower(e($model->name));
            })

            ->addColumn('email')
            ->addColumn('phone_number')
            ->addColumn('image')
            ->addColumn('img', function (User $user) {
                return '<img src="' . asset($user->image) . '" style="width: 100px; height: 100px;">';
            })
            ->addColumn('created_at_formatted', fn (User $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (User $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
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

            Column::make('UNIT ID', 'unit_id')
                ->hidden()
                ->makeInputRange(),
            
            Column::add()
                ->title('UNIT')
                ->field('unit', 'unit_id')
                ->makeInputText()
                ->searchable()
                ->sortable(),

            Column::make('SCHOOL YEAR ID', 'school_year_id')
                ->hidden()
                ->makeInputRange(),

            Column::add()
                ->title('TAHUN AJARAN')
                ->field('school_year', 'school_year_id')
                ->makeInputText()
                ->hidden()
                ->searchable()
                ->sortable(),

            Column::make('NAME', 'name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('EMAIL', 'email')
                ->sortable()
                ->hidden()
                ->searchable()
                ->makeInputText(),

            Column::make('PHONE NUMBER', 'phone_number')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('IMAGE', 'img'),

            Column::make('TANGGAL DAFTAR', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

            Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')
                ->searchable()
                ->sortable()
                ->hidden()
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
     * PowerGrid User Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        return [
            Button::add('detail')
                ->bladeComponent('livewire.detail-button', [
                    "route"     => '/admin/users/',
                    "id"        => 'id',
                ]),
            // Button::add('download')
            //     ->bladeComponent('livewire.download-button', [
            //         "route"     => '/admin/users/',
            //         "id"        => 'id',
            //     ])
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
     * PowerGrid User Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($user) => $user->id === 1)
                ->hide(),
        ];
    }
    */
}
