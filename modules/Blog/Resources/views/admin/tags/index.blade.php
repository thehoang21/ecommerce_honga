@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('blog::admin.blog_tags.name'))

    <li class="active">{{ trans('blog::admin.blog_tags.name') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'blog_tags')
    @slot('name', trans('blog::admin.blog_tag.name'))

    @component('admin::components.table')
        @slot('thead')
            <tr>
                @include('admin::partials.table.select_all')

                <th>{{ trans('admin::admin.table.id') }}</th>
                <th>{{ trans('blog::admin.blog_tags.table.name') }}</th>
                <th data-sort>{{ trans('admin::admin.table.created') }}</th>
            </tr>
        @endslot
    @endcomponent
@endcomponent

@push('scripts')
    <script type="module">
        new DataTable('#blog_tags-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'name', name: 'translations.name' },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
@endpush
