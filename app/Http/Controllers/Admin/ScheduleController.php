<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Schedule\DestroySchedule;
use App\Http\Requests\Admin\Schedule\IndexSchedule;
use App\Http\Requests\Admin\Schedule\StoreSchedule;
use App\Http\Requests\Admin\Schedule\UpdateSchedule;
use App\Models\AdminUser;
use App\Models\Schedule;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ScheduleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSchedule $request
     * @return array|Factory|View
     */
    public function index(IndexSchedule $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Schedule::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['date', 'dentist_id', 'end', 'id', 'start'],

            // set columns to searchIn
            ['id'],
            function ($query) {
                $query->with(['dentist']);
            }
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.schedule.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.schedule.create');

        return view('admin.schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSchedule $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSchedule $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $user = AdminUser::find(auth()->user()->id);

        // Store the Schedule
        $user->schedules()->create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/schedules'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/schedules');
    }

    /**
     * Display the specified resource.
     *
     * @param Schedule $schedule
     * @throws AuthorizationException
     * @return void
     */
    public function show(Schedule $schedule)
    {
        $this->authorize('admin.schedule.show', $schedule);

        $schedule->load('dentist');

        return view('admin.schedule.show', ['schedule' => $schedule]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Schedule $schedule
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Schedule $schedule)
    {
        $this->authorize('admin.schedule.edit', $schedule);


        return view('admin.schedule.edit', [
            'schedule' => $schedule,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSchedule $request
     * @param Schedule $schedule
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSchedule $request, Schedule $schedule)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Schedule
        $schedule->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/schedules'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/schedules');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySchedule $request
     * @param Schedule $schedule
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySchedule $request, Schedule $schedule)
    {
        $schedule->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }
}
