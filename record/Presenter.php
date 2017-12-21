<?php

class Presenter{
    public function response($status, $type, $data){
        $data = array(
            'status' => $status,
            'type' => $type,
            'data' => $data,
        );
        return json_encode($data);
    }
}
