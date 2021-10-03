@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.schedule.actions.show', ['name' => $schedule->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <schedule-form
                :action="'{{ $schedule->resource_url }}'"
                :data="{{ $schedule->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-show" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.schedule.actions.show', ['name' => $schedule->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.schedule.components.form-elements', ['mode' => 'show'])
                    </div>
                </form>

        </schedule-form>

        </div>

</div>

@endsection
