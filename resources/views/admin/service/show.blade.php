@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.service.actions.show', ['name' => $service->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <service-form
                :action="'{{ $service->resource_url }}'"
                :data="{{ $service->toJson() }}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-show" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.service.actions.show', ['name' => $service->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.service.components.form-elements', ['mode' => 'show'])
                    </div>
                </form>

        </service-form>

        </div>

</div>

@endsection
