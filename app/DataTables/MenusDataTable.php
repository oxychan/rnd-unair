<?php

namespace App\DataTables;

use Carbon\Carbon;
use App\Models\Menu;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class MenusDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($menu) {
                return "<div class='dropdown'>
                    <button class='btn btn-light btn-active-light-primary btn-sm dropdown-toggle' type='button' id='actionButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    Action
                    </button>
                    <div class='dropdown-menu' aria-labelledby='actionButton'>
                        <a class='dropdown-item px-3' href='javascript:void(0)' id='editMenu' data-id='" . $menu->id . "'>Edit</a>
                        <a class='dropdown-item px-3' href='javascript:void(0)' id='deleteMenu' data-id='" . $menu->id . "'>Hapus</a>
                    </div>
                </div>";
            })
            ->editColumn('created_at', function ($menu) {
                $formatedDate = Carbon::parse($menu->created_at);
                return $formatedDate->format('d M Y');
            })
            ->editColumn('updated_at', function ($menu) {
                $formatedDate = Carbon::parse($menu->updated_at);
                return $formatedDate->format('d M Y');
            })
            ->editColumn('url', function ($menu) {
                return "<a href=" . $menu->url . " class='badge badge-dark fw-bold'>" . $menu->url  . "</a>";
            })
            ->editColumn('icon', function ($menu) {
                return "<i class='" . $menu->icon . " text-dark'></i>";
            })
            ->editColumn('root', function ($menu) {
                $root = $menu->parent->name ?? 'root';
                return "<div class='badge badge-dark fw-bold'>" . $root . "</div>";
            })
            ->rawColumns(['action', 'url', 'icon', 'root'])
            ->addIndexColumn()
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Menu $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Menu $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('menus-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->serverSide()
            ->orderBy(1)
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
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->searchable(false)->orderable(false),
            Column::make('name')->title('Name'),
            Column::make('url')->title('Url'),
            Column::make('icon')->title('Icon'),
            Column::make('root')->title('Root'),
            Column::make('order')->title('Order'),
            Column::make('created_at')->title('Created At'),
            Column::make('updated_at')->title('Updated At'),
            Column::computed('action')
                ->title('Action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Menus_' . date('YmdHis');
    }
}
