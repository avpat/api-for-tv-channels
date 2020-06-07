<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ChannelResource;
use App\Programme;

class ChannelController extends Controller
{
    /**
     * Provides timetable for the selected channel, date and timezone
     *
     * Add the timezone to requested date, get the programme for selected channel and date
     *
     * NOTE: I'm assuming date is an ISO 8601 formatted date e.g. 2020-07-01 & timezone as "Europe/Paris", "America/Argentina/Catamarca"
     *
     * @author AVP
     *
     * @param $uuid
     * @param $date
     * @param $tzContinent
     * @param $tzRegion
     * @param null $tzCity
     * @return ChannelResource
     *
     */
    public function getTimetable($uuid, $date, $tzContinent, $tzRegion, $tzCity = null): ChannelResource
    {

        //requested date
        $nDate = new \DateTime($date);
        //adding timezone
        !is_null($tzCity)
            ? $nDate->setTimezone(new \DateTimeZone($tzContinent . '/' . $tzRegion . '/' . $tzCity))
            : $nDate->setTimezone(new \DateTimeZone($tzContinent . '/' . $tzRegion));

        $timetable = Programme::where('channel_id', $uuid)
            ->whereDate('start_time', '=', $nDate->format('Y-m-d'))
            ->get();

        $timeline = [];

        foreach ($timetable as $programme) {
            $timeline[] = [
                'uuid' => $programme->channel_id,
                'programme_name'    => $programme->name,
                'start_time'    => $programme->start_time,
                'end_time'  => $programme->end_time,
                'duration'  => $this->getTimeDifference($programme->start_time, $programme->end_time)
            ];
        }

        return new ChannelResource($timeline);
    }

    /**
     *
     *
     * @param $channelUid
     * @param $programmeUid
     * @return ChannelResource
     *
     */
    public function getInformation($channelUid, $programmeUid)
    {
        $information = Programme::where('channel_id', $channelUid)
            ->where('id', $programmeUid)
            ->get();

        return new ChannelResource($information);
    }

    /**
     * calculate time difference in seconds
     *
     * @param $start
     * @param $end
     * @return false|int
     */
    protected function getTimeDifference($start, $end)
    {
        return strtotime($end) - strtotime($start);
    }
}
