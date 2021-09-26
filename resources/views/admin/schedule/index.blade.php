@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.schedule.actions.index'))

@section('body')

    <schedule-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/schedules') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.schedule.actions.index') }}
@can('admin.schedule.create')
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/schedules/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.schedule.actions.create') }}</a>
@endcan
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">

                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>

                                        <th is='sortable' :column="'id'">{{ trans('admin.schedule.columns.id') }}</th>
                                        <th is='sortable' :column="'dentist.full_name'">{{ trans('admin.schedule.columns.dentist_id') }}</th>
                                        <th is='sortable' :column="'date'">{{ trans('admin.schedule.columns.date') }}</th>
                                        <th is='sortable' :column="'start'">{{ trans('admin.schedule.columns.start') }}</th>
                                        <th is='sortable' :column="'end'">{{ trans('admin.schedule.columns.end') }}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" >

                                        <td>@{{ item.id }}</td>
                                        <td>@{{ item.dentist.full_name }}</td>
                                        <td>@{{ item.date | date }}</td>
                                        <td>@{{ item.start | time }}</td>
                                        <td>@{{ item.end | time }}</td>
                                        <td>
                                            <div class="row no-gutters">
@can('admin.schedule.show')
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + ''" title="{{ trans('brackets/admin-ui::admin.btn.show') }}" role="button"><i class="fa fa-eye"></i></a>
                                                </div>
@endcan
@can('admin.schedule.edit')
                                                <div class="col">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>
@endcan
@can('admin.schedule.delete')
                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                                </form>
@endcan
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
@can('admin.schedule.create')
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/schedules/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.schedule.actions.create') }}</a>
@endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </schedule-listing>

@endsection
