<?php

namespace Laravel\Octane;

use Laravel\Octane\Contracts\DispatchesCoroutines;
use Laravel\Octane\Contracts\DispatchesTasks;
use Throwable;

class Octane
{
    use ProvidesDefaultConfigurationOptions;
    use ProvidesRouting;

    /**
     * Get the coroutine dispatcher.
     *
     * @return \Laravel\Contracts\Octane\DispatchesCoroutines
     */
    public function coroutines()
    {
        return app(DispatchesCoroutines::class);
    }

    /**
     * Get the task dispatcher.
     *
     * @return \Laravel\Contracts\Octane\DispatchesTasks
     */
    public function tasks()
    {
        return app(DispatchesTasks::class);
    }

    /**
     * Format an exception to a string that should be returned to the client.
     *
     * @param  \Throwable  $e
     * @param  bool  $debug
     * @return string
     */
    public static function formatExceptionForClient(Throwable $e, $debug = false): string
    {
        return $debug ? (string) $e : 'Internal server error.';
    }
}