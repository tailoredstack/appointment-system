@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.feedback.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">

        <feedback-form
            :action="'{{ url('admin/feedback') }}'"
            :data="{ patient_id: {{auth()->user()->id}} }"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.feedback.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.feedback.components.form-elements', ['mode' => 'create'])
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </feedback-form>

        </div>

        </div>


@endsection
