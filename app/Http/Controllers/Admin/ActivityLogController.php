<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ActivityLog\BulkDestroyActivityLog;
use App\Http\Requests\Admin\ActivityLog\DestroyActivityLog;
use App\Http\Requests\Admin\ActivityLog\IndexActivityLog;
use App\Http\Requests\Admin\ActivityLog\StoreActivityLog;
use App\Http\Requests\Admin\ActivityLog\UpdateActivityLog;
use App\Models\ActivityLog;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ActivityLogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexActivityLog $request
     * @return array|Factory|View
     */
    public function index(IndexActivityLog $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ActivityLog::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            [''],

            // set columns to searchIn
            ['']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.activity-log.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.activity-log.create');

        return view('admin.activity-log.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreActivityLog $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreActivityLog $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ActivityLog
        $activityLog = ActivityLog::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/activity-logs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/activity-logs');
    }

    /**
     * Display the specified resource.
     *
     * @param ActivityLog $activityLog
     * @throws AuthorizationException
     * @return void
     */
    public function show(ActivityLog $activityLog)
    {
        $this->authorize('admin.activity-log.show', $activityLog);

        return view('admin.activity-log.show', compact('activityLog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ActivityLog $activityLog
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ActivityLog $activityLog)
    {
        $this->authorize('admin.activity-log.edit', $activityLog);


        return view('admin.activity-log.edit', [
            'activityLog' => $activityLog,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateActivityLog $request
     * @param ActivityLog $activityLog
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateActivityLog $request, ActivityLog $activityLog)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ActivityLog
        $activityLog->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/activity-logs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/activity-logs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyActivityLog $request
     * @param ActivityLog $activityLog
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyActivityLog $request, ActivityLog $activityLog)
    {
        $activityLog->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyActivityLog $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyActivityLog $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ActivityLog::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
