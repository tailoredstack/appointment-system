@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.dentist.actions.edit', ['name' => $dentist->email]))

@section('body')

<div class="container-xl">
    <div class="card">

        <dentist-form :action="'{{ $dentist->resource_url }}'" :data="{{ $dentist->toJson() }}" v-cloak inline-template>

            <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action"
                novalidate>


                <div class="card-header">
                    <i class="fa fa-pencil"></i> {{ trans('admin.dentist.actions.edit', ['name' => $dentist->email]) }}
                </div>

                <div class="card-body">
                    @include('admin.dentist.components.form-elements', ['mode'=> 'edit'])
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </dentist-form>

    </div>

</div>

@endsection
