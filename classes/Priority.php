<?php

class Priority
{

    public $process_events = [];
    public $burst_time = [];
    public $priority = [];
    public $priority_and_btime = [];
    public $total_events = '';
    public $num_b_time = '';
    public $num_priority = '';

    //Manage data
    public function setData(array $input)
    {
        if (array_key_exists('process_events', $input)) {
            $this->process_events = explode(',', $input['process_events']);
        }
        if (array_key_exists('burst_time', $input)) {
            $this->burst_time = explode(',', $input['burst_time']);
        }
        if (array_key_exists('priority', $input)) {
            $this->priority = explode(',', $input['priority']);
        }
        if (!empty($this->burst_time) AND !empty($this->priority)) {
            $this->priority_and_btime = array_combine($this->priority, $this->burst_time);
            ksort($this->priority_and_btime);
            $this->burst_time = array_values($this->priority_and_btime);
        }
        $this->total_events = count($this->process_events);
        $this->num_b_time = count($this->burst_time);
        $this->num_priority = count($this->priority);

        return $this;
    }

    //Priority Scheduling algorithm
    public function priorityAlgorithm()
    {
        if ($this->total_events == $this->num_b_time AND $this->total_events == $this->num_priority) {
            $limit = $this->total_events;
            $limit = $limit - 1;
            $w_time = 0;
            $temp_w_time = 0;
            for ($i = 0; $i < $limit; $i++) {
                $w_time = $w_time + $this->burst_time[$i];
                $temp_w_time = $temp_w_time + $w_time;
            }
            $avg_w_time = $temp_w_time / $this->total_events;

            return $avg_w_time;
        } else {
            return false;
        }
    }

    //return Average waiting time
    public function getOutput()
    {
        return $this->priorityAlgorithm();
    }
}