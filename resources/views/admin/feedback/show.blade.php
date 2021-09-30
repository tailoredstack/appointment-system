@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.feedback.actions.show'))

@section('body')

    <div class="container-xl">

                <div class="card">

        <feedback-form
            :action="'{{ url('admin/feedback') }}'"
            :data="{{$feedback->toJson()}}"
            v-cloak
            inline-template>

            <form class="form-horizontal form-show" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card-header">
                    {{ trans('admin.feedback.actions.show') }}
                </div>

                <div class="card-body">
                    @include('admin.feedback.components.form-elements', ['mode' => 'show'])
                </div>


            </form>

        </feedback-form>

        </div>

        </div>


@endsection
