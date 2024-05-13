<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\Referral;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                // $edit = "<a href='".route('profile.edit')."' class='btn btn-primary'><i class='fas fa-edit'></i></a>";

                $referrals = Referral::with('user')->where('referred_by',  $query->username)->count();
                $showReferal = "<div class='d-flex gap-2'><a href='".route('profile.edit', $query->id)."' class='btn btn-primary mr-3'><i class='fas fa-edit'></i></a> 
                <button type='button' class='btn show-modal text-white' data-toggle='modal' data-target='#exampleModalLong' data-referred_by='$query->username' style='background-color:#009933;'>  
                <i class='fas fa-users'></i> ($referrals) <i class='fas fa-caret-down'> </i>
                </button></div>";

                // return $edit.' '.$showReferal;
                return $showReferal;
            })
            // ->addColumn('referrals', function($query){

            //     $referrals = Referral::with('user')->where('referred_by',  $query->username)->count();

            //     $showReferal = "<button type='button' class='btn show-modal text-white' data-toggle='modal' data-target='#exampleModalLong' data-referred_by='$query->username' style='background-color:#009933;'>  
            //     View Referrals ($referrals) <i class='fas fa-caret-down'> </i>
            //     </button>";
    
            //     return $showReferal;
            // })
            ->addColumn('account_name', function ($query) {

                return @$query->bank->account_name;
            })
            ->addColumn('account_number', function ($query) {

                return @$query->bank->account_number;
            })
            ->addColumn('bank_name', function ($query) {

                return @$query->bank->bank_name;
            })
            ->addColumn('date_of_birth', function ($query) {

                return $query->date_of_birth;
            })
            // ->addColumn('joined_at(Y-m-d)', function ($query) {

            //     return $query->created_at;
            // })
            ->filter(function ($query) {
                $query->where('role', '=', 'user');
            })
            ->rawColumns(['action', 'referrals', 'joined_at(Y-m-d)', 'date_of_birth'])
            ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0,'ASC')
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name')->width(70),
            Column::make('email'),
            Column::make('account_name'),
            Column::make('account_number'),
            Column::make('bank_name'),
            // Column::make('referrals'),
            Column::make('date_of_birth'),

            // Column::make('joined_at(Y-m-d)'),
            // Column::make('updated_at'),
            Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
