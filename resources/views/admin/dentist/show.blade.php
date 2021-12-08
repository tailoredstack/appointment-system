@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.dentist.actions.show', ['name' => $dentist->name]))

@section('body')

<div class="container-xl">
    <div class="card">

        <dentist-form :action="'{{ $dentist->resource_url }}'" :data="{{ $dentist->toJson() }}" v-cloak inline-template>

            <form class="form-horizontal form-show" novalidate>


                <div class="card-header">
                    <i class="fa fa-eye"></i> Show Dentist
                </div>

                <div class="card-body">
                    @include('admin.dentist.components.form-elements', ['mode' => 'show'])
                </div>
            </form>

        </dentist-form>

    </div>

</div>

@endsection
