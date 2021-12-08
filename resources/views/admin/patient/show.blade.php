@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.patient.actions.show', ['name' => "$patient->first_name $patient->last_name"]))

@section('body')

<div class="container-xl">
    <div class="card">

        <patient-form :action="'{{ $patient->resource_url }}'" :data="{{ $patient->toJson() }}" v-cloak inline-template>

            <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action"
                novalidate>


                <div class="card-header">
                    <i class="fa fa-eye"></i> {{ trans('admin.patient.actions.show', ['name' => "$patient->first_name
                    $patient->last_name"])
                    }}
                </div>

                <div class="card-body">
                    @include('admin.patient.components.form-elements', ['mode'=> 'show'])
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </patient-form>

    </div>

</div>

@endsection
