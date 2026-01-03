<?php
function calculateHours($checkIn, $checkOut) {
  $start = strtotime($checkIn);
  $end   = strtotime($checkOut);
  if ($end <= $start) {
    return ['00:00:00', '00:00:00'];
  }
  $diff = $end - $start; // seconds
  $work_seconds = min($diff, 8 * 3600); // up to 8 hours
  $extra_seconds = max(0, $diff - 8 * 3600);

  $work_str = gmdate('H:i:s', $work_seconds);
  $extra_str = gmdate('H:i:s', $extra_seconds);
  return [$work_str, $extra_str];
}
