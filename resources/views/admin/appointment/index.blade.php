@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.appointment.actions.index'))

@section('body')

<appointment-listing :data="{{ $data->toJson() }}" :url="'{{ url('admin/appointments') }}'" inline-template>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> {{ trans('admin.appointment.actions.index') }}
                    @can('admin.appointment.export')
                    <a class="btn btn-primary btn-sm pull-right m-b-0 ml-2"
                        href="{{ url('admin/appointments/export') }}" role="button"><i
                            class="fa fa-file-excel-o"></i>&nbsp; Export</a>
                    @endcan
                    @can('admin.appointment.create')
                    <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0"
                        href="{{ url('admin/appointments/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{
                        trans('admin.appointment.actions.create') }}</a>
                    @endcan
                </div>
                <div class="card-body" v-cloak>
                    <div class="card-block">
                        <form @submit.prevent="">
                            <div class="row justify-content-md-between">
                                <div class="col col-lg-7 col-xl-5 form-group">
                                    <div class="input-group">
                                        <input class="form-control"
                                            placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}"
                                            v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-primary"
                                                @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{
                                                trans('brackets/admin-ui::admin.btn.search') }}</button>
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

                                    <th is='sortable' :column="'id'">{{ trans('admin.appointment.columns.id') }}</th>
                                    <th is='sortable' :column="'patient.id'">{{
                                        trans('admin.appointment.columns.patient_id') }}</th>
                                    <th is='sortable' :column="'dentist.id'">{{
                                        trans('admin.appointment.columns.dentist_id') }}</th>
                                    <th is='sortable' :column="'service.name'">{{
                                        trans('admin.appointment.columns.service_id') }}</th>
                                    <th is='sortable' :column="'date'">{{ trans('admin.appointment.columns.date') }}
                                    </th>
                                    <th is='sortable' :column="'start'">{{ trans('admin.appointment.columns.start') }}
                                    </th>
                                    <th is='sortable' :column="'end'">{{ trans('admin.appointment.columns.end') }}</th>
                                    <th is='sortable' :column="'status'">{{ trans('admin.appointment.columns.status') }}
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in collection">

                                    <td>@{{ item.id }}</td>
                                    <td>@{{ item.patient.full_name }}</td>
                                    <td>@{{ item.dentist.full_name }}</td>
                                    <td>@{{ item.service.name }}</td>
                                    <td>@{{ item.date | date }}</td>
                                    <td>@{{ item.start | time }}</td>
                                    <td>@{{ item.end | time }}</td>
                                    <td>@{{ item.status }}</td>

                                    <td>
                                        <div class="row no-gutters">
                                            @can('admin.activity-log.create')
                                            <form class="col" @submit.prevent="clientArrived(item.id)">
                                                <button type="submit"
                                                    class="btn btn-sm btn-spinner btn-infobtn-sm btn-spinner btn-info"
                                                    title="Add arrived timestamp"><i class="fa fa-clock-o"></i></button>
                                            </form>
                                            @endcan
                                            @can('admin.appointment.show')
                                            <div class="col-auto">
                                                <a class="btn btn-sm btn-spinner btn-info"
                                                    :href="item.resource_url + ''"
                                                    title="{{ trans('brackets/admin-ui::admin.btn.show') }}"
                                                    role="button"><i class="fa fa-eye"></i></a>
                                            </div>
                                            @endcan
                                            @can('admin.appointment.edit')
                                            <div class="col">
                                                <a class="btn btn-sm btn-spinner btn-info"
                                                    :class="{ disabled: ['cancelled', 'rejected', 'done'].includes(item.status) }"
                                                    :href="item.resource_url + '/edit'"
                                                    title="{{ trans('brackets/admin-ui::admin.btn.edit') }}"
                                                    role="button"><i class="fa fa-edit"></i></a>
                                            </div>
                                            @endcan
                                            @can('admin.appointment.delete')
                                            <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i
                                                        class="fa fa-trash-o"></i></button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row" v-if="pagination.state.total > 0">
                            <div class="col-sm">
                                <span class="pagination-caption">{{
                                    trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                            </div>
                            <div class="col-sm-auto">
                                <pagination></pagination>
                            </div>
                        </div>

                        <div class="no-items-found" v-if="!collection.length > 0">
                            <i class="icon-magnifier"></i>
                            <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                            <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                            @can('admin.appointment.create')
                            <a class="btn btn-primary btn-spinner" href="{{ url('admin/appointments/create') }}"
                                role="button"><i class="fa fa-plus"></i>&nbsp; {{
                                trans('admin.appointment.actions.create') }}</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</appointment-listing>

@endsection
